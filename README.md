# Picture tag for Kirby 2

An extension for KirbyText making the picture element available as a tag. Although you can use the picture element for all responsive images. It is advised to only use it for art directional purposes. See [Responsive Images Community Group](http://responsiveimages.org) for more information about the picture element.

This tag includes BEM style classes for complete styling control.

## Installation

1. Copy ‘picture.php’ inside ‘tags’ to Kirby’s ‘site/tags/‘ folder.
2. Make sure you have picturefill.js, if not:

  1. Copy ‘picturefill-3.0.0-rc.min.js’ inside ‘assets/js/' to Kirby’s ‘assets/js/‘ folder or [download the latest version](http://scottjehl.github.io/picturefill/).
  2. Place ```<?php echo js(‘assets/js/picturefill-3.0.0-rc.min.js’) ?>``` in your footer file above ```</body>```.

## Usage

### Attributes

- **picture**: filename without modifiers and extension.
- **extension**: extension for the different images. If no extension is given, it will be 'jpg'.
- **class**: optional class name.
- **caption**: text for figcaption.
- **alt**: image alt text.
- **width**: width in pixels, given to image.
- **height**: height in pixels, given to image.

You can use this KirbyText tag in your text as:

```
(picture: scrum-process extension: png class: infographic caption: This is how Scrum works. alt: Scrum infographic width: 600px height: 400px)
```

Be careful, you need to write the filename without an extension. The extension is written as a separate attribute. When you do not use the extension attribute, the extension will be ‘jpg’.

### File names

Naming files should be written as follows:

- ```picture.jpg``` (fall back)
- ```picture~palm.jpg```
- ```picture~palm@2x.jpg```
- ```picture~hand.jpg```
- ```picture~hand@2x.jpg```
- ```picture~lap.jpg```
- ```picture~lap@2x.jpg```
- ```picture~desk.jpg```
- ```picture~desk@2x.jpg```

The file name convention is based on file name convention for Apple's iOS. If you want, you can change this in ‘picture.php’.

### Viewport widths

The 'palm' image will be visible when the viewport is smaller than 460px. The 'hand' image will be visible between 461px and 700px. The 'lap' image will be visible between 701px and 1060px. The 'desk' image will be visible when the viewport is wider than 1061px. If you want, you can change these values in 'picture.php'.
