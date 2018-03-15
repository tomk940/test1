/**
 * myStore Customizer Custom Functionality
 *
 */
( function( $ ) {
    
    $( window ).load( function() {
        
        //Show / Hide Color selector for header setting
        var the_header_select_value = $( '#customize-control-mystore-header-layout select' ).val();
        mystore_customizer_header_check( the_header_select_value );
        
        $( '#customize-control-mystore-header-layout select' ).on( 'change', function() {
            var header_select_value = $( this ).val();
            mystore_customizer_header_check( header_select_value );
        } );
        
        function mystore_customizer_header_check( header_select_value ) {
            if ( header_select_value == 'mystore-header-layout-standard' ) {
                $( '#sub-accordion-section-mystore-site-layout-section-header #customize-control-mystore-header-bg-color' ).show();
                $( '#sub-accordion-section-mystore-site-layout-section-header #customize-control-mystore-header-remove-site-logo' ).hide();
            } else {
                $( '#sub-accordion-section-mystore-site-layout-section-header #customize-control-mystore-header-bg-color' ).hide();
                $( '#sub-accordion-section-mystore-site-layout-section-header #customize-control-mystore-header-remove-site-logo' ).show();
            }
        }
        
        //Show / Hide Color selector for slider setting
        var the_slider_select_value = $( '#customize-control-mystore-slider-type select' ).val();
        mystore_customizer_slider_check( the_slider_select_value );
        
        $( '#customize-control-mystore-slider-type select' ).on( 'change', function() {
            var slider_select_value = $( this ).val();
            mystore_customizer_slider_check( slider_select_value );
        } );
        
        function mystore_customizer_slider_check( slider_select_value ) {
            if ( slider_select_value == 'mystore-slider-default' ) {
                $( '#sub-accordion-section-mystore-site-layout-section-slider #customize-control-mystore-meta-slider-shortcode' ).hide();
                $( '#sub-accordion-section-mystore-site-layout-section-slider #customize-control-mystore-slider-cats' ).show();
            } else if ( slider_select_value == 'mystore-meta-slider' ) {
                $( '#sub-accordion-section-mystore-site-layout-section-slider #customize-control-mystore-slider-cats' ).hide();
                $( '#sub-accordion-section-mystore-site-layout-section-slider #customize-control-mystore-meta-slider-shortcode' ).show();
            } else {
                $( '#sub-accordion-section-mystore-site-layout-section-slider #customize-control-mystore-slider-cats' ).hide();
                $( '#sub-accordion-section-mystore-site-layout-section-slider #customize-control-mystore-meta-slider-shortcode' ).hide();
            }
        }
        
    } );
    
} )( jQuery );