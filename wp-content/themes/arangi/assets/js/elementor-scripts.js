(function ($) {
    "use strict";

    var isEditMode = false;

    function mybe_note_undefined($selector, $data_atts) {
		return ($selector.data($data_atts) !== undefined) ? $selector.data($data_atts) : '';
	}

    var AdvanceTabHandler = function ($scope, $) {
        var $currentTab = $scope.find('.apr-advance-tabs'),
            $currentTabId = '#' + $currentTab.attr('id').toString();

            $($currentTabId + ' .apr-tabs-nav ul li').each( function(index) {
                if( $(this).hasClass('active-default') ) {
                    $($currentTabId + ' .apr-tabs-nav > ul li').removeClass('active').addClass('inactive');
                    $(this).removeClass('inactive');
                }else {
                    if( index == 0 ) {
                        $(this).removeClass('inactive').addClass('active');
            
                    }
                }
            } );

            $($currentTabId + ' .apr-tabs-content div').each( function(index) {
                if( $(this).hasClass('active-default') ) {
                    $($currentTabId + ' .apr-tabs-content > div').removeClass('active');
                }else {
                    if( index == 0 ) {
                        $(this).removeClass('inactive').addClass('active');
                    }
                }
            } );

            $($currentTabId + ' .apr-tabs-nav ul li').click(function(){
                var currentTabIndex = $(this).index();
                var tabsContainer = $(this).closest('.apr-advance-tabs');
                var tabsNav = $(tabsContainer).children('.apr-tabs-nav').children('ul').children('li');
                var tabsContent = $(tabsContainer).children('.apr-tabs-content').children('div');
            
                $(this).parent('li').addClass('active');
            
                $(tabsNav).removeClass('active active-default').addClass('inactive');
                $(this).addClass('active').removeClass('inactive');
            
                $(tabsContent).removeClass('active').addClass('inactive');
                $(tabsContent).eq(currentTabIndex).addClass('active').removeClass('inactive');
            
                $(tabsContent).each( function(index) {
                    $(this).removeClass('active-default');
            });
        });
    }
    
    $(window).on('elementor/frontend/init', function () {
        if(elementorFrontend.isEditMode()) {
            isEditMode = true;
        }
        
        elementorFrontend.hooks.addAction('frontend/element_ready/apr-adv-tabs.default', AdvanceTabHandler);
    });

}(jQuery));