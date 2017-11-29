$(document).ready(function () {
  initBootstrapPopover()
  resizePanels()
  initShuffle()
})

function resizePanels() {
  // Resize elements to the tallest
  // Get an array of all element heights
  var elementHeights = $('#tools .panel').map(function() {
    return $(this).height();
  }).get();
  // Math.max takes a variable number of arguments
  // `apply` is equivalent to passing each height as an argument
  var maxHeight = Math.max.apply(null, elementHeights);
  // Set each height to the max height
  $('#tools .panel').height(maxHeight);
}

function initBootstrapPopover() {
  $('.tool-popover').popover({
    container: 'body',
    trigger: 'focus'
  })
}

function initShuffle() {
  // Shuffle
  var Shuffle = window.Shuffle;
  var element = document.querySelector('#tools');
  var sizer = element.querySelector('#tools .tool');
  function sortByTitle(element) { return element.getAttribute('data-title').toLowerCase(); }
  var options = options = { by: sortByTitle };

  var shuffleInstance = new Shuffle(element, {
    itemSelector: '#tools .tool',
    sizer: sizer,
    initialSort: options
  });

  $('#tools-families .btn').click(function() {
    var id = $(this).data('id')
    shuffleInstance.filter(id)
    $('#tools-families .btn-primary').removeClass('btn-primary')
    $(this).addClass('btn-primary')
  });
}