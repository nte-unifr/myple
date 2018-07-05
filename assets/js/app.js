// css dependencies
require('../css/app.scss')

// js
var $ = require('jquery')
var store = require('store')
import mixitup from 'mixitup'
require('bootstrap')

$(document).ready(function () {
  videoStore()
  initBsElements()
  if ($( "#tools" ).length) {
    initMixitup()
  }
})

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

function initMixitup() {
  var mixer = mixitup('#tools', {
    load: {
      sort: 'order:asc'
    },
    selectors: {
      control: '[data-mixitup-control]'
    },
    callbacks: {
      onMixStart: function() {
        $('.tools-popover').popover('hide')
      }
    }
  })
}