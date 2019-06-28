// css dependencies
require('../css/app.scss')

// js
var $ = require('jquery')
var store = require('store')
import mixitup from 'mixitup'
require('bootstrap')
require('typeface-open-sans')

$(document).ready(function () {
  videoStore()
  initBsElements()
  if ($('#tools').length) {
    initMixitup()
  }
  if ($('.tools-list').length) {
    displayToolFamilies()
  }
})

// < Custom functions
// 
function videoStore() {
  // hide video if asked
  if (!store.get('hide-video')) {
    $('#video-intro').addClass('d-md-block')
  }
  // trigger click to hide video
  $('#video-close-button').click(function () {
    $('#video-intro').removeClass('d-md-block')
    store.set('hide-video', true)
  })
}
function displayToolFamilies() {
  $('.tools-list .tool .family').each(function() {
    let id = $(this).data('id')
    $(this).closest('.tools-list').find('.family.family-' + id).removeClass('d-none')
  });
}
//
// Custom functions >

// < Bootstrap functions
// 
function initBsElements() {
  // resources popover
  $('.popover-toggler').popover({
    html: true,
    trigger: 'hover',
    delay: { "show": 50, "hide": 2000 }
  })
  $('.popover-toggler').hover(function() {
    $('.popover-toggler').not(this).popover('hide')
  })

  // tools popover
  $('.tools-popover').popover({
    content: function() {
      let id = $(this).data('id')
      return $('.tool-activities[data-id="' + id + '"]').clone()
    },
    html: true 
  })

  // tooltips activation
  $('[data-toggle="tooltip"]').tooltip()
}
//
// Bootstrap functions >

// < Mixitup functions
// 
function initMixitup() {
  var targetSelector = '.mix'
  var mixer = mixitup('#tools', {
    load: {
      sort: 'order:asc',
      filter: function() {
        var hash = window.location.hash.replace(/^#/g, '')
        var selector = hash ? '.' + hash : targetSelector
        return selector
      }()
    },
    selectors: {
      control: '[data-mixitup-control]'
    },
    callbacks: {
      onMixStart: function() {
        $('.tools-popover').popover('hide')
      },
      onMixEnd: function(state) {
        var newHash = '#' + state.activeFilter.selector.replace(/^\./g, '')
        history.replaceState(undefined, undefined, newHash)
        let count = $('.tool:visible').length
        $('#tools-counter').text(count)
      }
    }
  })
}
//
// Mixitup functions >