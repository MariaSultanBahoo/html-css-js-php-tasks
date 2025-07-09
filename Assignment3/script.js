function updateClock() {
  const now = new Date();
  const time = now.toLocaleTimeString('en-US', { hour12: false });
  document.getElementById('clock').textContent = time;
}

setInterval(updateClock, 1000);
updateClock();


// Generate Calendar
function generateCalendar() {
  const calendarDiv = document.getElementById("calendar");
  const now = new Date();
  const year = now.getFullYear();
  const month = now.getMonth();

  const firstDay = new Date(year, month, 1).getDay();
  const lastDate = new Date(year, month + 1, 0).getDate();

  const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

  let table = "<table class='table table-bordered'><thead><tr>";
  for (let day of days) {
    table += `<th>${day}</th>`;
  }
  table += "</tr></thead><tbody><tr>";

  for (let i = 0; i < firstDay; i++) {
    table += "<td></td>";
  }

  for (let day = 1; day <= lastDate; day++) {
    table += `<td>${day}</td>`;
    if ((day + firstDay) % 7 === 0) {
      table += "</tr><tr>";
    }
  }

  table += "</tr></tbody></table>";
  calendarDiv.innerHTML = table;
}
generateCalendar();

// Simulated browser history
const links = [
  "https://www.google.com",
  "https://www.github.com",
  "https://www.stackoverflow.com",
  "https://www.wikipedia.org",
  "https://chat.openai.com"
];

let html = "<ul style='padding-left: 20px;'>";
for (let link of links) {
  html += `<li><a href="${link}" target="_blank">${link}</a></li>`;
}
html += "</ul>";
document.getElementById("historyFrame").srcdoc = html;

// Open new window
function openWindow() {
  const newWin = window.open("", "_blank", "width=500,height=400");
  newWin.document.write(`
    <html>
    <head>
      <title>New Window</title>
      <style>
        body {
          font-family: 'Roboto Slab', serif;
          background: #eaf4ff;
          padding: 30px;
          text-align: center;
        }
        h1 {
          color: #007bff;
        }
        p {
          font-size: 1.2rem;
        }
      </style>
    </head>
    <body>
      <h1>Welcome to window.open() Formatting</h1>
      <p>This is a new window opened from the main page, styled with custom formatting.</p>
    </body>
    </html>
  `);
}
