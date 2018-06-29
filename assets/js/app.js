// css dependencies
require('../css/app.scss')

// js
var $ = require('jquery')
var store = require('store')
require('bootstrap')

$(document).ready(function () {
  videoStore()
  popoverResources()
  bootstrapElements()
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

function popoverResources() {
  // resources popover
  $('.popover-toggler').popover({
    html: true,
    trigger: 'hover',
    delay: { "show": 50, "hide": 2000 }
  })
  $('.popover-toggler').hover(function() {
    $('.popover-toggler').not(this).popover('hide')
  })
}

function bootstrapElements() {
  // tooltips activation
  $('[data-toggle="tooltip"]').tooltip()
}