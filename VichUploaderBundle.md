VichUploaderBundle
=======================
**1- usage**

Ce guide vous montrera comment gérer un téléchargement de fichier, stocker le fichier sur le système de fichiers (ou sur un serveur distant si vous préférez) et persister le nom de fichier stocké dans la base de données.

Voici un résumé de ce que vous devrez faire:

     Configurer un mappage de téléchargement;
     Relier le mappage de téléchargement à une entité;
     Configurez les événements du cycle de vie (étape facultative).

Remarque:

     Tout au long du guide, nous utiliserons Doctrine ORM comme moteur de persistance sur les exemples. Bien que la plupart du temps, il n'y aura pas beaucoup de différence si vous utilisez un moteur différent.

**Étape 1: configurez un mappage de téléchargement**

Chaque fois que vous devez télécharger quelque chose de nouveau dans votre système, vous commencerez par configurer où il devrait être stocké (upload_destination), le chemin d'accès web à ce répertoire (uri_prefix) et donner le nom de chargement d'un nom (Product_image dans notre exemple).

# app/config/config.yml
*/ vich_uploader:
    db_driver: orm

    mappings:
        product_image:
            uri_prefix:         /images/products
            upload_destination: '%kernel.root_dir%/../web/images/products' /*

C'est la configuration minimale nécessaire pour décrire un carnet de travail.

Remarque:

Le comportement par défaut utilise le nom d'origine du fichier chargé, il peut remplacer un ancien fichier portant le même nom. Utilisez une nominative comme vich_uploader.namer_property pour éviter ce problème.

**Étape 2: lier le mappage de téléchargement à une entité**

a dernière étape consiste à créer un lien entre le système de fichiers et l'entité que vous souhaitez faire uploader.

Nous avons déjà créé une représentation abstraite du système de fichiers (le mappage), alors nous devons simplement indiquer au groupe quelle entité doit utiliser ce mappage. Dans ce guide, nous utiliserons des annotations pour y parvenir, mais vous pouvez également utiliser YAML ou XML.

D'abord, annotez votre classe avec l'annotation téléchargeable. C'est vraiment comme un drapeau indiquant que l'entité contient des champs téléchargeables.

Ensuite, vous devez créer les deux champs nécessaires pour que le bundle fonctionne:

    Créez un champ (par exemple, imageName) qui sera stocké dans la base de données en tant que chaîne. Cela contiendra le nom de fichier du fichier téléchargé.
    Créez un autre champ (par exemple, imageFile). Cela stockera l'objet UploadedFile après la transmission du formulaire. Cela ne devrait pas être persisté dans la base de données, mais vous devez l'annoter.

L'annotation UploadableField présente quelques options. Ils sont les suivants:

    Mappage: requis, le nom de mappage spécifié dans la configuration du faisceau à utiliser;
    FileNameProperty: requis, la propriété qui contiendra le nom du fichier téléchargé;
    Taille: la propriété qui contiendra la taille en octets du fichier téléchargé;
    MimeType: la propriété qui contiendra le type mime du fichier téléchargé;
    Nom d'origine: la propriété qui contiendra le nom d'origine du fichier téléchargé.

*/ Voir entité BASE /*

**Étape 3: configurez les événements du cycle de vie (étape facultative)**

Même si le mappage précédent fonctionne pleinement, vous pouvez personnaliser le comportement à adopter lorsque vos entités sont hydratées, mises à jour ou supprimées. Par exemple: les fichiers doivent-ils être mis à jour ou supprimés en conséquence?

Trois options de configuration simples vous permettent de répondre aux besoins de votre application.

*/ vich_uploader:
    db_driver: orm
    mappings:
        product_image:
            uri_prefix:         /images/products
            upload_destination: %kernel.root_dir%/../web/images/products

            inject_on_load:     false
            delete_on_update:   true
            delete_on_remove:   true /*


Toutes les options sont listées ci-dessous:

Delete_on_remove: default true, si le fichier doit être supprimé lorsque l'entité est supprimée;
Delete_on_update: true par défaut, si le fichier doit être supprimé lorsqu'un nouveau fichier est téléchargé;
inject_on_load: false par défaut, si le fichier doit être injecté dans l'entité chargée de l'envoi lorsqu'il est chargé à partir du magasin de données. L'objet sera une instance de


**Generating URLs**
Generating a URL in a Controller

To get a URL for the file, you can use the vich_uploader.templating.helper service as follows:

*/ $entity = …; // get the entity..
$helper = $this->container->get('vich_uploader.templating.helper.uploader_helper');
$path = $helper->asset($entity, 'image'); /*

Where image is the field name used in your entity where you added the UploadableField annotation/configuration.

Note:

    The path returned is relative to the web directory which is specified using the uri_prefix configuration parameter.

Generating a URL in a Twig Template

In a Twig template you can use the vich_uploader_asset function:

*/ <img src="{{ vich_uploader_asset(product, 'image') }}" alt="{{ product.name }}" /> /*

Note:

    If the product variable is hydrated as an array (instead of an object), you will need to manually specify the class name:

{{ vich_uploader_asset(product, 'image', 'FooBundle\\Entity\\Product') }}
