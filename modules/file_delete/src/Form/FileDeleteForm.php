<?php

namespace Drupal\file_delete\Form;

use Drupal\Component\Datetime\TimeInterface;
use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Entity\EntityRepositoryInterface;
use Drupal\Core\Entity\EntityTypeBundleInfoInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Routing\RouteProviderInterface;
use Drupal\Core\Url;
use Drupal\file\FileUsage\FileUsageInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

/**
 * Provides a form for deleting a File.
 */
class FileDeleteForm extends ContentEntityConfirmFormBase {

  /**
   * The file being deleted.
   *
   * @var \Drupal\file\FileInterface
   */
  protected $entity;

  /**
   * The File Usage Service.
   *
   * @var \Drupal\file\FileUsage\FileUsageInterface
   */
  protected FileUsageInterface $fileUsage;

  /**
   * Route Provider for all Drupal-stored routes.
   *
   * @var \Drupal\Core\Routing\RouteProviderInterface
   */
  protected RouteProviderInterface $routeProvider;

  /**
   * {@inheritdoc}
   */
  public function __construct(FileUsageInterface $file_usage, RouteProviderInterface $route_provider, EntityRepositoryInterface $entity_repository, EntityTypeBundleInfoInterface $entity_type_bundle_info = NULL, TimeInterface $time = NULL) {
    $this->fileUsage = $file_usage;
    $this->routeProvider = $route_provider;

    parent::__construct($entity_repository, $entity_type_bundle_info, $time);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('file.usage'),
      $container->get('router.route_provider'),
      $container->get('entity.repository'),
      $container->get('entity_type.bundle.info'),
      $container->get('datetime.time')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to delete the file %file_name (%file_path) ?', [
      '%file_name' => $this->entity->getFilename(),
      '%file_path' => $this->entity->getFileUri(),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return new Url('view.files.page_1');
  }

  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->t('Delete File');
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $usages = $this->fileUsage->listUsage($this->entity);
    if ($usages) {
      $fileUsagesUrl = $this->getFileUsagesUrl($this->entity->id());

      // If we cannot get the File Usages View, show a simpler message.
      if (FALSE === $fileUsagesUrl) {
        $this->messenger()->addError($this->t('The file %file_name cannot be deleted because it is in use by the following modules: %modules.', [
          '%file_name' => $this->entity->getFilename(),
          '%modules' => implode(', ', array_keys($usages)),
        ]));

        return;
      }

      $this->messenger()->addError($this->t('The file %file_name cannot be deleted because it is in use by the following modules: %modules.<br>Click <a href=":link_to_usages">here</a> to see its usages.', [
        '%file_name' => $this->entity->getFilename(),
        '%modules' => implode(', ', array_keys($usages)),
        ':link_to_usages' => $fileUsagesUrl,
      ]));

      return;
    }

    // Mark the file for removal by file_cron().
    $this->entity->setTemporary();
    $this->entity->save();

    $this->messenger()->addMessage($this->t('The file %file_name has been marked for deletion.', [
      '%file_name' => $this->entity->getFilename(),
    ]));

    $form_state->setRedirect('view.files.page_1');
  }

  /**
   * Helper function to get the File Usages view url for the given file.
   *
   * @param int|string $fileEntityId
   *   The File Entity Id.
   *
   * @return \Drupal\Core\GeneratedUrl|false|string
   *   The Url String of the View or FALSE if not possible.
   */
  private function getFileUsagesUrl($fileEntityId) {
    try {
      $url = new Url('view.files.page_2', ['arg_0' => $fileEntityId]);
      return $url->toString();
    }
    catch (RouteNotFoundException $e) {
      // Do nothing.
    }

    return FALSE;
  }

}
