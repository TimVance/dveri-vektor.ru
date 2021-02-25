$( document ).ready( function () {
	$(".drugoy_2 a.dropdown-toggle").removeClass("dropdown-item dropdown-toggle active-dropdown").addClass("d-block text-left pl-3");
	$(".active a.dropdown-toggle").removeClass("dropdown-item dropdown-toggle active-dropdown").addClass("d-block text-left pl-3");
	$(".rod_2 a.dropdown-toggle").removeClass("dropdown-item active-dropdown").addClass("d-block text-left pl-3");
	$(".drugoy_3 a.dropdown-toggle").removeClass("dropdown-item dropdown-toggle active-dropdown");
    $( '.dropdown-menu a.dropdown-toggle' ).on( 'click', function ( e ) {
        var $el = $( this );
        $el.toggleClass('active-dropdown');
        var $parent = $( this ).offsetParent( ".dropdown-menu" );
        if ( !$( this ).next().hasClass( 'show' ) ) {
            $( this ).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( "show" );
        }
        var $subMenu = $( this ).next( ".dropdown-menu" );
        $subMenu.toggleClass( 'show' );
        
        $( this ).parent( "li" ).toggleClass( 'show' );

        $( this ).parents( 'li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function ( e ) {
            $( '.dropdown-menu .show' ).removeClass( "show" );
            $el.removeClass('active-dropdown');
        } );
        
         if ( !$parent.parent().hasClass( 'navbar-nav' ) ) {
            $el.next().css( { "top": $el[0].offsetTop, "left": $parent.outerWidth() - 4 } );
        }

        return false;
    } );
} );