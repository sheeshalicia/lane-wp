/**
 * Divider Component CSS.
 *
 * @param string builder_type Builder Type.
 * @param string divider_count HTML Count.
 * @since x.x.x
 *
 */
function astra_builder_divider_css( builder_type = 'header', divider_count ) {

	var tablet_break_point    = astraBuilderPreview.tablet_break_point || 768,
        mobile_break_point    = astraBuilderPreview.mobile_break_point || 544;

    for ( var index = 1; index <= divider_count; index++ ) {

		let selector = ( 'header' === builder_type ) ? '.ast-header-divider-' + index : '.footer-widget-area[data-section="section-fb-divider-' + index + '"]';

		let section = ( 'header' === builder_type ) ? 'section-hb-divider-' + index : 'section-fb-divider-' + index;

		// Advanced Visibility CSS Generation.
		astra_builder_visibility_css( section, selector );

		( function ( index ) {
			astra_css(
				'astra-settings[' + builder_type + '-divider-' + index + '-style]',
				'border-style',
				selector + ' .ast-divider-wrapper'
			);

			wp.customize( 'astra-settings[' + builder_type + '-divider-' + index + '-color]', function( setting ) {
				setting.bind( function( color ) {

					var dynamicStyle = '',
						borderStyle = (typeof ( wp.customize._value['astra-settings[' + builder_type + '-divider-' + index + '-style]'] ) != 'undefined') ? wp.customize._value['astra-settings[' + builder_type + '-divider-' + index + '-style]']._value : '';
					dynamicStyle += selector + ' .ast-divider-wrapper, .ast-mobile-popup-content ' + selector + ' .ast-divider-wrapper {';
					dynamicStyle += 'border-style: ' + borderStyle + ';';
					dynamicStyle += 'border-color: ' + color + ';';
					dynamicStyle += '} ';

					astra_add_dynamic_css( builder_type + '-divider-' + index + '-color', dynamicStyle );
				} );
			} );

			wp.customize( 'astra-settings[' + builder_type + '-divider-' + index + '-layout]', function ( value ) {
				value.bind( function ( newval ) {

					var context = ( 'header' === builder_type ) ? 'hb' : 'fb';
					var side_class = 'ast-' + context + '-divider-layout-' + newval;

					jQuery( '.ast-' + builder_type + '-divider-' + index ).removeClass( 'ast-' + context + '-divider-layout-horizontal' );
					jQuery( '.ast-' + builder_type + '-divider-' + index ).removeClass( 'ast-' + context + '-divider-layout-vertical' );
					jQuery( '.ast-' + builder_type + '-divider-' + index ).addClass( side_class );
				} );
			} );

			// Divider Thickness.
			wp.customize( 'astra-settings[' + builder_type + '-divider-' + index + '-thickness]', function( value ) {
				value.bind( function( size ) {
					if(
						size.desktop != '' || size.desktop != '' || size.desktop != '' || size.desktop != '' ||
						size.tablet != '' || size.tablet != '' || size.tablet != '' || size.tablet != '' ||
						size.mobile != '' || size.mobile != '' || size.mobile != '' || size.mobile != ''
					) {
						var dynamicStyle = '';
						dynamicStyle += selector + ' .ast-divider-layout-horizontal {';
						dynamicStyle += 'border-top-width: ' + size.desktop + 'px' + ';';
						dynamicStyle += '} ';

						dynamicStyle += selector + ' .ast-divider-layout-vertical {';
						dynamicStyle += 'border-right-width: ' + size.desktop + 'px' + ';';
						dynamicStyle += '} ';

						dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';

						dynamicStyle += selector + ' .ast-divider-layout-horizontal {';
						dynamicStyle += 'border-top-width: ' + size.tablet + 'px' + ';';
						dynamicStyle += '} ';

						dynamicStyle += selector + ' .ast-divider-layout-vertical {';
						dynamicStyle += 'border-right-width: ' + size.tablet + 'px' + ';';
						dynamicStyle += '} ';

						dynamicStyle += '} ';

						dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';

						dynamicStyle += selector + ' .ast-divider-layout-horizontal {';
						dynamicStyle += 'border-top-width: ' + size.mobile + 'px' + ';';
						dynamicStyle += '} ';

						dynamicStyle += selector + ' .ast-divider-layout-vertical {';
						dynamicStyle += 'border-right-width: ' + size.mobile + 'px' + ';';
						dynamicStyle += '} ';

						dynamicStyle += '} ';

						astra_add_dynamic_css( builder_type + '-divider-' + index + '-thickness', dynamicStyle );
					}
				} );
			} );

			// Divider Size.
			wp.customize( 'astra-settings[' + builder_type + '-divider-' + index + '-size]', function( value ) {
				value.bind( function( size ) {
					if(
						size.desktop != '' || size.desktop != '' || size.desktop != '' || size.desktop != '' ||
						size.tablet != '' || size.tablet != '' || size.tablet != '' || size.tablet != '' ||
						size.mobile != '' || size.mobile != '' || size.mobile != '' || size.mobile != ''
					) {
						var dynamicStyle = '';
						dynamicStyle += selector + '.ast-fb-divider-layout-horizontal .ast-divider-layout-horizontal,';
						dynamicStyle += selector + '.ast-hb-divider-layout-horizontal {';
						dynamicStyle += 'width: ' + size.desktop + '%' + ';';
						dynamicStyle += '} ';

						dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
						dynamicStyle += selector + '.ast-fb-divider-layout-horizontal .ast-divider-layout-horizontal,';
						dynamicStyle += selector + '.ast-hb-divider-layout-horizontal {';
						dynamicStyle += 'width: ' + size.tablet + '%' + ';';
						dynamicStyle += '} ';
						dynamicStyle += '} ';

						dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
						dynamicStyle += selector + '.ast-fb-divider-layout-horizontal .ast-divider-layout-horizontal,';
						dynamicStyle += selector + '.ast-hb-divider-layout-horizontal {';
						dynamicStyle += 'width: ' + size.mobile + '%' + ';';
						dynamicStyle += '} ';
						dynamicStyle += '} ';

						dynamicStyle += selector + ' .ast-divider-layout-vertical {';
						dynamicStyle += 'height: ' + size.desktop + '%' + ';';
						dynamicStyle += '} ';

						dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
						dynamicStyle += selector + ' .ast-divider-layout-vertical {';
						dynamicStyle += 'height: ' + size.tablet + '%' + ';';
						dynamicStyle += '} ';
						dynamicStyle += '} ';

						dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
						dynamicStyle += selector + ' .ast-divider-layout-vertical {';
						dynamicStyle += 'height: ' + size.mobile + '%' + ';';
						dynamicStyle += '} ';
						dynamicStyle += '} ';
						astra_add_dynamic_css( builder_type + '-divider-' + index + '-size', dynamicStyle );
					}
				} );
			} );

			// Margin.
			wp.customize( 'astra-settings[' + section + '-margin]', function( value ) {
				value.bind( function( margin ) {
					if(
						margin.desktop.bottom != '' || margin.desktop.top != '' || margin.desktop.left != '' || margin.desktop.right != '' ||
						margin.tablet.bottom != '' || margin.tablet.top != '' || margin.tablet.left != '' || margin.tablet.right != '' ||
						margin.mobile.bottom != '' || margin.mobile.top != '' || margin.mobile.left != '' || margin.mobile.right != ''
					) {
						var dynamicStyle = '';
						dynamicStyle += selector + ' {';
						dynamicStyle += 'margin-left: ' + margin['desktop']['left'] + margin['desktop-unit'] + ';';
						dynamicStyle += 'margin-right: ' + margin['desktop']['right'] + margin['desktop-unit'] + ';';
						dynamicStyle += 'margin-top: ' + margin['desktop']['top'] + margin['desktop-unit'] + ';';
						dynamicStyle += 'margin-bottom: ' + margin['desktop']['bottom'] + margin['desktop-unit'] + ';';
						dynamicStyle += '} ';

						dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
						dynamicStyle += selector + ' {';
						dynamicStyle += 'margin-left: ' + margin['tablet']['left'] + margin['tablet-unit'] + ';';
						dynamicStyle += 'margin-right: ' + margin['tablet']['right'] + margin['tablet-unit'] + ';';
						dynamicStyle += 'margin-top: ' + margin['tablet']['top'] + margin['desktop-unit'] + ';';
						dynamicStyle += 'margin-bottom: ' + margin['tablet']['bottom'] + margin['desktop-unit'] + ';';
						dynamicStyle += '} ';
						dynamicStyle += '} ';

						dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
						dynamicStyle += selector + ' {';
						dynamicStyle += 'margin-left: ' + margin['mobile']['left'] + margin['mobile-unit'] + ';';
						dynamicStyle += 'margin-right: ' + margin['mobile']['right'] + margin['mobile-unit'] + ';';
						dynamicStyle += 'margin-top: ' + margin['mobile']['top'] + margin['desktop-unit'] + ';';
						dynamicStyle += 'margin-bottom: ' + margin['mobile']['bottom'] + margin['desktop-unit'] + ';';
						dynamicStyle += '} ';
						dynamicStyle += '} ';
						astra_add_dynamic_css(  section + '-margin', dynamicStyle );
					}
				} );
			} );

		})(index);

    }
}

/**
 * Social Component CSS.
 *
 * @param string builder_type Builder Type.
 * @param string social_count HTML Count.
 * @since x.x.x
 */
function astra_builder_addon_social_css( builder_type = 'header', social_count ) {

	var tablet_break_point    = astraBuilderPreview.tablet_break_point || 768,
		mobile_break_point    = astraBuilderPreview.mobile_break_point || 544;

	for ( var index = 1; index <= social_count; index++ ) {

		let selector = '.ast-' + builder_type + '-social-' + index + '-wrap';



		( function ( index ) {

			// Margin.
			wp.customize( 'astra-settings[' + builder_type + '-social-' + index + '-stack]', function( value ) {
				value.bind( function( value ) {

						jQuery('.ast-' + builder_type + '-social-' + index + '-wrap .' + builder_type + '-social-inner-wrap').removeClass( 'ast-social-stack-tablet' );
						jQuery('.ast-' + builder_type + '-social-' + index + '-wrap .' + builder_type + '-social-inner-wrap').removeClass( 'ast-social-stack-mobile' );
						jQuery('.ast-' + builder_type + '-social-' + index + '-wrap .' + builder_type + '-social-inner-wrap').removeClass( 'ast-social-stack-desktop' );
						jQuery('.ast-' + builder_type + '-social-' + index + '-wrap .' + builder_type + '-social-inner-wrap').removeClass( 'ast-social-stack-none' );

						jQuery('.ast-' + builder_type + '-social-' + index + '-wrap .' + builder_type + '-social-inner-wrap').addClass( 'ast-social-stack-' + value );

						var dynamicStyle = '';
						let social_spacing = wp.customize( 'astra-settings[' + builder_type + '-social-' + index + '-space]' ).get();
						let social_spacing_desktop = ( '' !== social_spacing['desktop'] ) ? social_spacing['desktop'] / 2 : '';
						let social_spacing_tablet = ( '' !== social_spacing['tablet'] ) ? social_spacing['tablet'] / 2 : '';
						let social_spacing_mobile = ( '' !== social_spacing['mobile'] ) ? social_spacing['mobile'] / 2 : '';

						if ( 'desktop' === value ) {

							dynamicStyle += selector + '  .ast-social-stack-desktop .ast-builder-social-element {';
							dynamicStyle += 'display: flex;';
							dynamicStyle += 'margin-left: unset;';
							dynamicStyle += 'margin-right: unset;';
							dynamicStyle += 'margin-top: ' + social_spacing_desktop + 'px;';
							dynamicStyle += 'margin-bottom: ' + social_spacing_desktop + 'px;';
							dynamicStyle += '} ';
						}
						if ( 'tablet' === value ) {
							dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
							dynamicStyle += selector + '  .ast-social-stack-tablet .ast-builder-social-element {';
							dynamicStyle += 'display: flex;';
							dynamicStyle += 'margin-left: unset;';
							dynamicStyle += 'margin-right: unset;';
							dynamicStyle += 'margin-top: ' + social_spacing_tablet + 'px;';
							dynamicStyle += 'margin-bottom: ' + social_spacing_tablet + 'px;';
							dynamicStyle += '} ';
							dynamicStyle += '} ';
						}
						if ( 'mobile' === value ) {
							dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
							dynamicStyle += selector + '  .ast-social-stack-mobile .ast-builder-social-element {';
							dynamicStyle += 'display: flex;';
							dynamicStyle += 'margin-left: unset;';
							dynamicStyle += 'margin-right: unset;';
							dynamicStyle += 'margin-top: ' + social_spacing_mobile + 'px;';
							dynamicStyle += 'margin-bottom: ' + social_spacing_mobile + 'px;';
							dynamicStyle += '} ';
							dynamicStyle += '} ';
						}
						astra_add_dynamic_css(  builder_type + '-social-' + index + '-stack', dynamicStyle );
				} );
			} );

			// Icon Space.
			wp.customize( 'astra-settings[' + builder_type + '-social-' + index + '-space]', function( value ) {
				value.bind( function( spacing ) {
					let social_stack = wp.customize( 'astra-settings[' + builder_type + '-social-' + index + '-stack]' ).get();

					var space = '';
					var dynamicStyle = '';
					if ( spacing.desktop != '' && 'desktop' === social_stack ) {
						space = spacing.desktop/2;
						dynamicStyle += selector + ' .ast-social-stack-desktop .ast-builder-social-element {';
						dynamicStyle += 'margin-top: ' + space + 'px;';
						dynamicStyle += 'margin-bottom: ' + space + 'px;';
						dynamicStyle += '} ';
					}

					if ( spacing.tablet != '' && 'tablet' === social_stack ) {
						space = spacing.tablet/2;
						dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
						dynamicStyle += selector + ' .ast-social-stack-tablet .ast-builder-social-element {';
						dynamicStyle += 'margin-top: ' + space + 'px;';
						dynamicStyle += 'margin-bottom: ' + space + 'px;';
						dynamicStyle += '} ';
						dynamicStyle += '} ';
					}

					if ( spacing.mobile != '' && 'mobile' === social_stack ) {
						space = spacing.mobile/2;
						dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
						dynamicStyle += selector + ' .ast-social-stack-mobile .ast-builder-social-element {';
						dynamicStyle += 'margin-top: ' + space + 'px;';
						dynamicStyle += 'margin-bottom: ' + space + 'px;';
						dynamicStyle += '} ';
						dynamicStyle += '} ';
					}

					astra_add_dynamic_css( builder_type + '-social-icons-icon-space-toggle-button-addon', dynamicStyle );
				} );
			} );

		})( index );
	}
}

/**
 * language Switcher Component CSS.
 *
 * @param string builder_type Builder Type.
 * @param string lswitcher_count HTML Count.
 * @since x.x.x
 *
 */
function astra_builder_language_switcher_css( builder_type = 'header' ) {

	var tablet_break_point    = astraBuilderPreview.tablet_break_point || 768,
        mobile_break_point    = astraBuilderPreview.mobile_break_point || 544;

	let selector = ( 'header' === builder_type ) ? '.ast-header-language-switcher' : '.ast-footer-language-switcher-element[data-section="section-fb-language-switcher"]';

	let section = ( 'header' === builder_type ) ? 'section-hb-language-switcher' : 'section-fb-language-switcher';

	// Advanced Visibility CSS Generation.
	astra_builder_visibility_css( section, selector );

	// Flag spacing.
	wp.customize( 'astra-settings[' + section + '-flag-spacing]', function( value ) {
		value.bind( function( size ) {
			var dynamicStyle = '';
			if(
				size.desktop != '' || size.desktop != '' || size.desktop != '' || size.desktop != '' ||
				size.tablet != '' || size.tablet != '' || size.tablet != '' || size.tablet != '' ||
				size.mobile != '' || size.mobile != '' || size.mobile != '' || size.mobile != ''
			) {
				dynamicStyle += 'span.ast-lswitcher-item-' + builder_type + ' {';
				dynamicStyle += 'margin-right: ' + size.desktop + 'px' + ';';
				dynamicStyle += '} ';

				dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';

				dynamicStyle += 'span.ast-lswitcher-item-' + builder_type + ' {';
				dynamicStyle += 'margin-right: ' + size.tablet + 'px' + ';';
				dynamicStyle += '} ';

				dynamicStyle += '} ';

				dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';

				dynamicStyle += 'span.ast-lswitcher-item-' + builder_type + ' {';
				dynamicStyle += 'margin-right: ' + size.mobile + 'px' + ';';
				dynamicStyle += '} ';

				dynamicStyle += '} ';
			}
			astra_add_dynamic_css( section + '-flag-spacing', dynamicStyle );
		} );
	} );

	// Flag Thickness.
	wp.customize( 'astra-settings[' + section + '-flag-size]', function( value ) {
		value.bind( function( size ) {
			var dynamicStyle = '';
			if( size.desktop !== '' || size.tablet !== '' || size.mobile !== '' ) {
				dynamicStyle += '.ast-lswitcher-item-' + builder_type + ' img {';
				dynamicStyle += 'width: ' + size.desktop + 'px' + ';';
				dynamicStyle += '} ';
				dynamicStyle += '.ast-lswitcher-item-' + builder_type + ' svg {';
				dynamicStyle += 'height: ' + size.desktop + 'px' + ';';
				dynamicStyle += 'width: ' + size.desktop + 'px' + ';';
				dynamicStyle += '} ';

				dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';

				dynamicStyle += '.ast-lswitcher-item-' + builder_type + ' img {';
				dynamicStyle += 'width: ' + size.tablet + 'px' + ';';
				dynamicStyle += '} ';
				dynamicStyle += '.ast-lswitcher-item-' + builder_type + ' svg {';
				dynamicStyle += 'height: ' + size.tablet + 'px' + ';';
				dynamicStyle += 'width: ' + size.tablet + 'px' + ';';
				dynamicStyle += '} ';

				dynamicStyle += '} ';

				dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';

				dynamicStyle += '.ast-lswitcher-item-' + builder_type + ' img {';
				dynamicStyle += 'width: ' + size.mobile + 'px' + ';';
				dynamicStyle += '} ';
				dynamicStyle += '.ast-lswitcher-item-' + builder_type + ' svg {';
				dynamicStyle += 'height: ' + size.mobile + 'px' + ';';
				dynamicStyle += 'width: ' + size.mobile + 'px' + ';';
				dynamicStyle += '} ';

				dynamicStyle += '} ';

			}
			astra_add_dynamic_css( section + '-flag-size', dynamicStyle );
		} );
	} );
}
