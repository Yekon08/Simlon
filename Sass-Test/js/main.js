var playPause = document.querySelector('.playpause');
var stop = document.querySelector('.stop');
var timeLabel = document.querySelector('.time');

var player = document.querySelector('video');
player.removeAttribute('controls');

playPause.onclick = function()
{
    
    if(player.paused)
    {
        player.play();
        playPause.textContent = 'Pause';
    }
    else
    {
        player.pause();
        playPause.textContent = 'Play';
    }
}

stop.onclick = function()
{
    player.pause();
    player.currentTime = 0;
    playPause.textContent = 'Play';
}

player.ontimeupdate = function() {
    var minutes = Math.floor(player.currentTime / 60);
    var seconds = Math.floor(player.currentTime - minutes * 60);
    var minuteValue;
    var secondValue;
  
    if (minutes<10) {
      minuteValue = "0" + minutes;
    } else {
      minuteValue = minutes;
    }
  
    if (seconds<10) {
      secondValue = "0" + seconds;
    } else {
      secondValue = seconds;
    }
  
    mediaTime = minuteValue + ":" + secondValue;
    timeLabel.textContent = mediaTime;
  };