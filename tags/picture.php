<?php

kirbytext::$tags['picture'] = array (

	'attr' => array (
		'extension',
		'class',
		'caption',
		'alt',
		'width',
		'height',
	),

	'html' => function ($tag) {

		// Place attributes in variables
		$name      = $tag->attr('picture');
		$extension = '.' . $tag->attr('extension', 'jpg'); // If no type is given, extension will be '.jpg'.
		$class     = $tag->attr('class');
		$caption   = $tag->attr('caption');
		$alt       = $tag->attr('alt');
		$width     = $tag->attr('width');
		$height    = $tag->attr('height');

		// Settings. You could change this if needed for your project. Modifiers are inspired by Apple's iOS.
		$range1Modifier   = '~palm';
		$range1UpperBound = '460px';
		$range2Modifier   = '~lap';
		$range2LowerBound = '461px';
		$range2UpperBound = '1024px';
		$range3Modifier   = '~desk';
		$range3LowerBound = '1025px';
		$retinaModifier   = '@2x';

		// State possible files
		$image        = $tag->page()->file($name . $extension);
		$image1       = $tag->page()->file($name . $range1Modifier . $extension);
		$image1Retina = $tag->page()->file($name . $range1Modifier . $extension . $retinaModifier);
		$image2       = $tag->page()->file($name . $range2Modifier . $extension);
		$image2Retina = $tag->page()->file($name . $range2Modifier . $extension . $retinaModifier);
		$image3       = $tag->page()->file($name . $range3Modifier . $extension);
		$image3Retina = $tag->page()->file($name . $range3Modifier . $extension . $retinaModifier);

		// Get the URL when file exist
		if ($image)        { $url = $image->url(); }
		if ($image1)       { $url1 = $image1->url(); }
		if ($image1Retina) { $url1Retina = $image1Retina->url(); }
		if ($image2)       { $url2 = $image2->url(); }
		if ($image2Retina) { $url2Retina = $image2Retina->url(); }
		if ($image3)       { $url3 = $image3->url(); }
		if ($image3Retina) { $url3Retina = $image3Retina->url(); }

		// Starting figure
		$buffer = '<figure';
		if ($class) { $buffer .= ' class="' . $class . '"'; }
		$buffer .= '>' . "\n";

		// Starting picture
		$buffer .= '<picture>' . "\n";

		// Source for palm (e.g. small)
		if ($image1 or $image1Retina) { $buffer .= '<source srcset="'; }
		if ($image1) { $buffer .= $url1; }
		if ($image1 and $image1Retina) { $buffer .= ', '; }
		if ($image1Retina) { $buffer .= $url1Retina . ' 2x'; }
		if ($image1 or $image1Retina) { $buffer .= '" media="(max-width: ' . $range1UpperBound . ')">' . "\n"; }

		// Source for lap (e.g. medium)
		if ($image2 or $image2Retina) { $buffer .= '<source srcset="'; }
		if ($image2) { $buffer .= $url2; }
		if ($image2 and $image2Retina) { $buffer .= ', '; }
		if ($image2Retina) { $buffer .= $url1Retina . ' 2x'; }
		if ($image2 or $image2Retina) { $buffer .= '" media="(min-width: ' . $range2LowerBound . ') and (max-width: ' . $range2UpperBound .')">' . "\n"; }

		// Source for desk (e.g. large)
		if ($image3 or $image3Retina) { $buffer .= '<source srcset="'; }
		if ($image3) { $buffer .= $url3; }
		if ($image3 and $image3Retina) { $buffer .= ', '; }
		if ($image3Retina) { $buffer .= $url3Retina . ' 2x'; }
		if ($image3 or $image3Retina) { $buffer .= '" media="(min-width: ' . $range3LowerBound . ')">' . "\n"; }

		// Use image without modifiers as fall back.
		$buffer .= '<img';
		if ($width) { $buffer .= ' width="' . $width . '"'; }
		if ($height) { $buffer .= ' height="' . $height . '"'; }
		if ($image) { $buffer .= ' src="' . $url . '"'; } else { $buffer .= ' src="' . $url3 . '"'; }
		if ($image3 and $image3Retina) { $buffer .= ' srcset="' . $url3 . ', ' . $url3Retina . ' 2x"'; }

		if ($alt) { $buffer .= ' alt="' . $alt . '"'; }
		$buffer .= '>' . "\n";

		// Ending picture
		$buffer .= '</picture>' . "\n";

		// Optional figure caption
		if ($caption) { $buffer .= '<figcaption>' . $caption . '</figcaption>' . "\n"; }

		// Ending figure
		$buffer .= '</figure>' . "\n";

		// Output buffer
		return $buffer;
	}
);

?>
