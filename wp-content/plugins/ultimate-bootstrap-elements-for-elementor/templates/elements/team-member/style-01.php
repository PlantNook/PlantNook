<?php
/**
 * @var $element Elementor\Widget_Base
 * @var $item_key
 * @var $image_html
 * @var $social_html
 * @var $team_member_tag
 * @var $name
 * @var $position
 * @var $description
 */
$element->add_render_attribute( "team_member_item{$item_key}", 'class', ['card','ube-tm-classic'] );
?>
<div <?php $element->print_render_attribute_string( "team_member_item{$item_key}" ) ?>>
	<?php if ($image_html !== ''): ?>
		<div class="ube-tm-image ube-image">
			<?php printf( '<%1$s %2$s>%3$s</%1$s>', $team_member_tag, $element->get_render_attribute_string( "image_link{$item_key}" ),$image_html );?>
		</div>
	<?php endif; ?>
	<div class="card-body">
		<?php if (!empty($name)): ?>
			<h4 <?php $element->print_render_attribute_string("name{$item_key}") ?>>
				<?php printf( '<%1$s %2$s>%3$s</%1$s>', $team_member_tag, $element->get_render_attribute_string( "name_link{$item_key}" ),$name );?>
			</h4>
		<?php endif; ?>

		<?php if (!empty($position)): ?>
			<p <?php $element->print_render_attribute_string("position{$item_key}") ?>>
				<?php echo wp_kses_post($position);?>
			</p>
		<?php endif; ?>

		<?php if (!empty($description)): ?>
			<p <?php $element->print_render_attribute_string("desc{$item_key}") ?>>
				<?php echo wp_kses_post($description);?>
			</p>
		<?php endif; ?>

		<?php if (!empty($social_html)): ?>
			<?php echo $social_html;?>
		<?php endif; ?>
	</div>
</div>