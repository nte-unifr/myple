var $ = require('jquery')
import mixitup from 'mixitup'
require('bootstrap')

$(document).ready(function () {
  initBootstrap()
  initMixitup()
})

function initBootstrap() {
  $('.tools-popover').popover({ content: getToolPopoverContent, html: true })
}

function getToolPopoverContent() {
  let id = $(this).data('id')
  return $('.tool-activities[data-id="' + id + '"]').clone()
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