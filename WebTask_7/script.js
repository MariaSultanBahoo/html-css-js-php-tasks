document.getElementById("feedbackForm").addEventListener("submit", function(e) {
    e.preventDefault();
  
    document.getElementById("outName").textContent = document.getElementById("name").value;
    document.getElementById("outEmail").textContent = document.getElementById("email").value;
    document.getElementById("outProduct").textContent = document.getElementById("product").value;
    document.getElementById("outRating").textContent = document.getElementById("rating").value;
    document.getElementById("outFeedback").textContent = document.getElementById("feedback").value;
  
    const checkedProducts = Array.from(document.querySelectorAll('input[name="tried"]:checked'))
      .map(cb => cb.value)
      .join(', ');
    document.getElementById("outTried").textContent = checkedProducts || "None selected";
  
    document.getElementById("output").style.display = "block";
  });
  