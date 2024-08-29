// text editor
CKEDITOR.replace('txtactivity')
CKEDITOR.replace('txtiterinary')

// end 
$(document).ready(function(){
    $('#tbl-all').DataTable()
    // end of document
})

function showProfile(){
    var x = document.getElementById("ka-prof");
    var icon=document.getElementById('le-icon');
    if (x.style.display === "none") {
      x.style.display = "block";
      icon.style.rotate='-180deg'
    } else {
      x.style.display = "none";
    }
  }

  function showSideBar(){
    var x = document.getElementById("to-show-hide");
    var nav=document.getElementById("to-show-hide");
    var view=document.getElementById("view");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
      nav.style.width='4%'
      view.style.width='96%'
    }
  }

  function addDay() {
    // Create a new day container
    var newDayContainer = document.createElement('div');
    newDayContainer.className = 'day-container';

    // Create input element for day title
    var titleInput = document.createElement('input');
    titleInput.type = 'text';
    titleInput.placeholder = 'Day - Title';
    titleInput.name = 'day-title'
    titleInput.className='day-title'

    var titleLabel = document.createElement('label')
    titleLabel.type ='label'
    titleLabel.className='small-text'
    titleLabel.innerHTML ='Day'

    // Create textarea element for activity
    var activityTextarea = document.createElement('textarea');
    activityTextarea.placeholder = 'Activity';
    activityTextarea.name = 'day-activity'
    activityTextarea.className='day-activity'

    var bodyLabel = document.createElement('label')
    bodyLabel.className='small-text'
    bodyLabel.innerHTML='Activity'

    //create a remove div
    var removeDiv = document.createElement('div')
    removeDiv.className = 'remove-day'
    removeDiv.onclick = function() {
      removeDay(this);
  };

    // Append input and textarea to the new day container
    newDayContainer.appendChild(titleLabel)
    newDayContainer.appendChild(titleInput);
    newDayContainer.appendChild(bodyLabel)
    newDayContainer.appendChild(activityTextarea);
    newDayContainer.appendChild(removeDiv)

    // Append the new day container to the days-holder
    document.querySelector('.days-holder').appendChild(newDayContainer);
}

function removeDay(element) {
  // Get the parent day-container and remove it
  var dayContainer = element.closest('.day-container');
  dayContainer.parentNode.removeChild(dayContainer);
}