# Picture tag for Kirby 2

An extension for KirbyText making the picture element available as a tag. Although you can use the picture element for all responsive images. It is advised to only use it for art directional purposes. See [Responsive Images Community Group](http://responsiveimages.org) for more information about the picture element.

## Installation

1. Copy ‘picture.php’ inside ‘tags’ to Kirby’s ‘site/tags/‘ folder.
2. Make sure you have picturefill.js, if not:
2.1. Copy ‘picturefill-2.2.0.min.js’ inside ‘assets/javascripts’ to Kirby’s ‘assets/javascripts/‘ folder or [download the latest version](http://scottjehl.github.io/picturefill/).
2.2. Place ```php
<?php echo js(‘assets/javascripts/picturefill-2.2.0.min.js’) ?>``` in your footer file above ``` </body>```.

## Usage

### Attributes

You can use the picture tag in your markdown files for Kirby as follows:

(picture: filename extension: png class: my-classname caption: a figcaption alt: alt text width: 100px height: 200px)

Be careful, you need to write the filename without an extension. The extension is written as a separate attribute. When you do not use the extension attribute, the extension will be ‘jpg’.

### File names

Naming files should be done as follows:

- filename.jpg (fall back)
- filename~palm.jpg
- filename~palm@2x.jpg
- filename~lap.jpg
- filename~lap@2x.jpg
- filename~desk.jpg
- filename~desk@2x.jpg

The naming convention is based on naming convention for Apple's iOS. If you want, you can change the naming convention in ‘picture.php’.

### Viewport widths

The 'palm' image will be visible when the viewport is smaller than 460px. The 'lap' image will be visible between 461px and 1024px. The 'desk' image will be visible when the viewport is wider than 1025px. If you want, you can change these media queries in 'picture.php'.
