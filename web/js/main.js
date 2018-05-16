$(document).ready(function () {
    // hide video if asked
    if (!store.get('hide-video')) {
      $('#video-panel').show()
    }
    // trigger click to hide video
    $('#video-panel button').click(function () {
      $('#video-panel').hide()
      store.set('hide-video', true)
    })
    // bootstrap tooltips setup
    $('.popover-toggler').popover({
      html: true,
      placement: 'top',
      trigger: 'hover',
      delay: { "show": 50, "hide": 2000 }
    })
    $('.popover-toggler').hover(function() {
      $('.popover-toggler').not(this).popover('hide')
    })
})