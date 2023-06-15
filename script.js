let startTime;
let stopwatchInterval;
let splits = [];
let lapTimes = [];
let lapTimer;

function startStopwatch() {
  if (!startTime) {
    startTime = new Date().getTime();
    stopwatchInterval = setInterval(updateStopwatch, 10);
    document.getElementById("startBtn").textContent = "Stop";
  } else {
    clearInterval(stopwatchInterval);
    startTime = null;
    document.getElementById("startBtn").textContent = "Start";
  }
}

function updateStopwatch() {
  const currentTime = new Date().getTime();
  const elapsedTime = currentTime - startTime;
  const minutes = Math.floor(elapsedTime / 60000);
  const seconds = Math.floor((elapsedTime % 60000) / 1000);
  const milliseconds = Math.floor((elapsedTime % 1000) / 10);
  document.getElementById("display").textContent = formatTime(minutes) + ":" + formatTime(seconds) + ":" + formatTime(milliseconds);
}

function formatTime(time) {
  return time < 10 ? "0" + time : time;
}

function splitTime() {
  if (startTime) {
    const currentTime = document.getElementById("display").textContent;
    splits.push(currentTime);
    updateSplits();
  }
}

function lapTime() {
  if (!lapTimer && startTime) {
    lapTimer = setInterval(updateLapTime, 10);
    document.getElementById("lapBtn").textContent = "Stop Lap";
  } else {
    clearInterval(lapTimer);
    lapTimer = null;
    document.getElementById("lapBtn").textContent = "Lap";
  }
}

function updateLapTime() {
  const currentTime = new Date().getTime();
  const elapsedTime = currentTime - startTime;
  const minutes = Math.floor(elapsedTime / 60000);
  const seconds = Math.floor((elapsedTime % 60000) / 1000);
  const milliseconds = Math.floor((elapsedTime % 1000) / 10);
  document.getElementById("display").textContent = formatTime(minutes) + ":" + formatTime(seconds) + ":" + formatTime(milliseconds);
}

function resetStopwatch() {
  clearInterval(stopwatchInterval);
  startTime = null;
  splits = [];
  lapTimes = [];
  lapTimer = null;
  document.getElementById("display").textContent = "00:00:00";
  document.getElementById("startBtn").textContent = "Start";
  document.getElementById("lapBtn").textContent = "Lap";
  document.getElementById("splits").innerHTML = "";
}

function updateSplits() {
  const splitsList = document.getElementById("splits");
  splitsList.innerHTML = "";
  for (let i = 0; i < splits.length; i++) {
    const li = document.createElement("li");
    li.textContent = splits[i];
    splitsList.appendChild(li);
  }
}

window.addEventListener("load", function() {
  document.getElementById("startBtn").addEventListener("click", startStopwatch);
  document.getElementById("splitBtn").addEventListener("click", splitTime);
  document.getElementById("lapBtn").addEventListener("click", lapTime);
  document.getElementById("resetBtn").addEventListener("click", resetStopwatch);
});
