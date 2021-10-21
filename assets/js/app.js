// css dependencies
require('../css/app.scss')

// js
var $ = require('jquery')
import mixitup from 'mixitup'
require('bootstrap')
require('typeface-open-sans')
const feather = require('feather-icons')

$(document).ready(function () {
  feather.replace()
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
      onMixStart: function(state, futureState) {
        $('.tools-popover').popover('hide')
      },
      onMixEnd: function(state) {
        var newHash = '#' + state.activeFilter.selector.replace(/^\./g, '')
        history.replaceState(undefined, undefined, newHash)
        updateToolsCounter(state.totalShow)
      }
    }
  })
  updateToolsCounter(mixer.getState().totalShow)
}
function updateToolsCounter(number) {
  $('#tools-counter').text(number)
}
//
// Mixitup functions >