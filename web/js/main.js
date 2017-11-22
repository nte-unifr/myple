$(document).ready(function () {
    // hide video if asked
    if (store.get('hide-video')) {
      $('#video-panel').hide()
    }
    // trigger click to hide video
    $('#video-panel button').click(function () {
      $('#video-panel').hide()
      store.set('hide-video', true)
    })
})