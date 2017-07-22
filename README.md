Base Application
=============================

La base des applications et backoffice avec Symfony 3

La table User a été créée, juste la mise en page a faire selon le template de la plateforme.

La table base regorge le paramétrage de base avec

 VichUploaderBundle:

    Pour l'upload des fichiers

    https://github.com/dustin10/VichUploaderBundle/blob/master/Resources/doc/index.md

    Parameters:

        app/config/config.yml:

            mappings:
                base_image:
                    uri_prefix:         /uploads
                    upload_destination: '%kernel.root_dir%/../web/uploads'
                    namer: vich_uploader.namer_uniqid

                    inject_on_load:     false
                    delete_on_update:   true
                    delete_on_remove:   true


          AppBundle/Form/BaseType.php:

           use Vich\UploaderBundle\Form\Type\VichImageType;
           ->add('imageFile', VichImageType::class, array(
                 'required' => false,
                 'allow_delete' => true,
             ))

 LiipImagineBundle:

    Pour la redimension des images

    https://github.com/liip/LiipImagineBundle

    Parameters:

        app/config/config.yml:

           base_thumb:
               quality: 75
               filters:
                   thumbnail: { size: [50, 50], mode: inset }
                   background: { size: [52, 52], position: center, color: '#ffffff'}

           base_thumb_w:
               quality: 100
               filters:
                   relative_resize:
                       widen: 50

      Twig:
          <img src="{{ asset('uploads/'~ base.imageName) | imagine_filter('base_thumb_w') }}" alt="{{ base.libelle }}" />
