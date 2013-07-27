; apigee make file for local development
core = "7.x"
api = "2"

projects[drupal][version] = "7.x"
; include the d.o. profile base
includes[] = "drupal-org.make"

; +++++ TODO modules without versions +++++

projects[devconnect][type] = "module"
projects[devconnect][download][type] = "git"
projects[devconnect][download][url] = "git@github.com:apigee/devconnect.git"
projects[devconnect][download][branch] = "7.x-4.21"
projects[devconnect][download][revision] = "93f6c0a05bb18c4e17d596e9669ff956092e7164"
projects[devconnect][subdir] = "custom"

projects[apigee_sso][type] = "module"
projects[apigee_sso][download][type] = "git"
projects[apigee_sso][download][url] = "git@github.com:apigee/apigee_drupal_sso.git"
projects[apigee_sso][subdir] = "custom"


; +++++ Themes +++++

projects[apigee_base][type] = "theme"
projects[apigee_base][download][type] = "git"
projects[apigee_base][download][url] = "git@github.com:apigee/apigee_drupal_base_theme.git"
projects[apigee_base][download][branch] = "devconnect"
projects[apigee_base][download][revision] = "0131ea205ded08bd12ff41f7020c07786899e209"

projects[apigee_base_responsive][type] = "theme"
projects[apigee_base_responsive][download][type] = "git"
projects[apigee_base_responsive][download][url] = "git@github.com:apigee/drupal-responsive-base-theme.git"
projects[apigee_base_responsive][download][revision] = "c258aed49308eb251a315eaffb599e267cdb55fe"

projects[apigee_devconnect][type] = "theme"
projects[apigee_devconnect][download][type] = "git"
projects[apigee_devconnect][download][url] = "git@github.com:apigee/apigee_drupal_devconnect_theme.git"
projects[apigee_devconnect][download][revision] = "ee988072b6051418cf9e9ea3088de4435f7927e3"

projects[apigee_devconnect_responsive][type] = "theme"
projects[apigee_devconnect_responsive][download][type] = "git"
projects[apigee_devconnect_responsive][download][url] = "git@github.com:apigee/drupal-responsive-devconnect-theme.git"
projects[apigee_devconnect_responsive][download][revision] = "797dc676aeb658b84997661ecbaa5b08359ef92f"



; +++++ Libraries +++++

libraries[backbone][directory_name] = "backbone"
libraries[backbone][type] = "library"
libraries[backbone][download][url] = "git://github.com/documentcloud/backbone.git"
libraries[backbone][download][tag] = "0.9.2"
libraries[backbone][download][type] = "git"
libraries[backbone][destination] = "libraries"

libraries[json2][directory_name] = "json2"
libraries[json2][type] = "library"
libraries[json2][download][url] = "git://github.com/douglascrockford/JSON-js.git"
libraries[json2][download][type] = "git"
libraries[json2][destination] = "libraries"

libraries[SolrPhpClient][directory_name] = "SolrPhpClient"
libraries[SolrPhpClient][type] = "library"
libraries[SolrPhpClient][download][url] = "http://solr-php-client.googlecode.com/files/SolrPhpClient.r60.2011-05-04.zip"
libraries[SolrPhpClient][download][type] = "get"
libraries[SolrPhpClient][destination] = "libraries"

libraries[glip][directory_name] = "glip"
libraries[glip][type] = "library"
libraries[glip][download][url] = "git://github.com/halstead/glip.git"
libraries[glip][download][type] = "git"
libraries[glip][destination] = "libraries"

libraries[jquery.cycle][directory_name] = "jquery.cycle"
libraries[jquery.cycle][type] = "library"
libraries[jquery.cycle][download][url] = "http://www.malsup.com/jquery/cycle/release/jquery.cycle.zip?v2.86"
libraries[jquery.cycle][download][type] = "get"
libraries[jquery.cycle][destination] = "libraries"

libraries[jquery.selectlist][directory_name] = "jquery.selectlist"
libraries[jquery.selectlist][type] = "library"
libraries[jquery.selectlist][download][url] = "http://odyniec.net/projects/selectlist/jquery.selectlist-0.5.zip"
libraries[jquery.selectlist][download][type] = "get"
libraries[jquery.selectlist][destination] = "libraries"

libraries[colorpicker][directory_name] = "colorpicker"
libraries[colorpicker][type] = "library"
libraries[colorpicker][download][url] = "http://www.eyecon.ro/colorpicker/colorpicker.zip"
libraries[colorpicker][download][type] = "get"
libraries[colorpicker][destination] = "libraries"

libraries[tinymce][directory_name] = "tinymce"
libraries[tinymce][type] = "library"
libraries[tinymce][download][url] = "http://cloud.github.com/downloads/tinymce/tinymce/tinymce_3.4.7.zip"
libraries[tinymce][download][type] = "get"
libraries[tinymce][destination] = "libraries"

libraries[mediaelement][directory_name] = "mediaelement"
libraries[mediaelement][type] = "library"
libraries[mediaelement][download][url] = "https://github.com/johndyer/mediaelement/archive/2.12.0.zip"
libraries[mediaelement][download][type] = "get"
libraries[mediaelement][destination] = "libraries"

libraries[s3-php5-curl][directory_name] = "s3-php5-curl"
libraries[s3-php5-curl][type] = "library"
libraries[s3-php5-curl][download][url] = "http://amazon-s3-php-class.googlecode.com/files/s3-php5-curl_0.4.0.tar.gz"
libraries[s3-php5-curl][download][type] = "get"
libraries[s3-php5-curl][destination] = "libraries"

libraries[codemirror][directory_name] = "codemirror"
libraries[codemirror][type] = "library"
libraries[codemirror][download][url] = "http://codemirror.net/codemirror.zip"
libraries[codemirror][download][type] = "get"
libraries[codemirror][destination] = "libraries"

libraries[ckeditor][directory_name] = "ckeditor"
libraries[ckeditor][type] = "library"
libraries[ckeditor][download][url] = "http://download.cksource.com/CKEditor/CKEditor/CKEditor%203.6.4/ckeditor_3.6.4.zip"
libraries[ckeditor][download][type] = "get"
libraries[ckeditor][destination] = "libraries"

libraries[spyc][directory_name] = "spyc"
libraries[spyc][type] = "library"
libraries[spyc][download][url] = "http://spyc.googlecode.com/files/spyc-0.5.zip"
libraries[spyc][download][type] = "get"
libraries[spyc][destination] = "libraries"

libraries[awssdk][directory_name] = "awssdk"
libraries[awssdk][type] = "library"
libraries[awssdk][download][url] = "http://pear.amazonwebservices.com/get/sdk-latest.zip"
libraries[awssdk][download][type] = "get"
libraries[awssdk][destination] = "libraries"