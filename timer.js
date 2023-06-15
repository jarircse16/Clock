document.getElementById("backBtn").addEventListener("click", function() {
  window.location.href = "index.html";
});

let timerInterval;
let endTime;

function startTimer() {
  const inputTime = document.getElementById("timerInput").value;
  const timeParts = inputTime.split(":");
  const hours = parseInt(timeParts[0]);
  const minutes = parseInt(timeParts[1]);
  const seconds = parseInt(timeParts[2]);
  const totalTime = (hours * 3600) + (minutes * 60) + seconds;
  endTime = new Date().getTime() + (totalTime * 1000);

  clearInterval(timerInterval);
  timerInterval = setInterval(updateTimer, 1000);
  document.getElementById("startBtn").disabled = true;
  document.getElementById("stopBtn").disabled = false;
  updateTimer(); // Update immediately after starting the timer
}

function updateTimer() {
  const currentTime = new Date().getTime();
  const remainingTime = Math.max(0, endTime - currentTime);

  const hours = Math.floor(remainingTime / (1000 * 60 * 60));
  const minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

  const displayTime = formatTime(hours) + ":" + formatTime(minutes) + ":" + formatTime(seconds);
  document.getElementById("timerDisplay").textContent = displayTime;

  if (remainingTime === 0) {
    clearInterval(timerInterval);
    playSound();
    document.getElementById("startBtn").disabled = false;
    document.getElementById("stopBtn").disabled = true;
  }
}



function stopTimer() {
  clearInterval(timerInterval);
  document.getElementById("startBtn").disabled = false;
  document.getElementById("stopBtn").disabled = true;
}

function resetTimer() {
  clearInterval(timerInterval);
  document.getElementById("timerDisplay").textContent = "00:00:00";
  document.getElementById("timerInput").value = "";
  document.getElementById("startBtn").disabled = false;
  document.getElementById("stopBtn").disabled = true;
}

function formatTime(time) {
  return time < 10 ? "0" + time : time;
}

function playSound() {
  const audio = new Audio("alarm_sound.mp3");
  audio.play();
}
