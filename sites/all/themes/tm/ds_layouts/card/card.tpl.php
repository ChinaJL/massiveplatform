<?php
/**
 * @file
 * Display Suite Card template.
 *
 * Available variables:
 *
 * Layout:
 * - $classes: String of classes that can be used to style this layout.
 * - $contextual_links: Renderable array of contextual links.
 * - $layout_wrapper: wrapper surrounding the layout.
 *
 * Regions:
 *
 * - $media: Rendered content for the "Media" region.
 * - $media_classes: String of classes that can be used to style the "Media" region.
 *
 * - $teaser: Rendered content for the "First column" region.
 * - $teaser_classes: String of classes that can be used to style the "Teaser" region.
 *
 * - $extra: Rendered content for the "Extra" region.
 * - $extra_classes: String of classes that can be used to style the "Extra" region.
 */
?>
<<?php print $layout_wrapper; print $layout_attributes; ?> class="card contained<?php print $classes;?> clearfix">
    <!-- Needed to activate contextual links -->
    <?php if (isset($title_suffix['contextual_links'])): ?>
      <?php print render($title_suffix['contextual_links']); ?>
    <?php endif; ?>

  <a href="<?php print url('node/' . $nid); ?>">
    <<?php print $media_wrapper; ?> class="media<?php print $media_classes; ?>">
      <?php print $media; ?>
    </<?php print $media_wrapper; ?>>

    <<?php print $teaser_wrapper; ?> class="teaser<?php print $teaser_classes; ?>">
      <?php print $teaser; ?>
    </<?php print $teaser_wrapper; ?>>

    <<?php print $extra_wrapper; ?> class="extra<?php print $extra_classes; ?>">
      <?php print $extra; ?>
    </<?php print $extra_wrapper; ?>>
  </a>
</<?php print $layout_wrapper ?>>

<!-- Needed to activate display suite support on forms -->
<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
