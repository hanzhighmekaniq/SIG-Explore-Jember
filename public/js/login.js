document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM fully loaded and parsed");

  const passwordInput = document.getElementById("password");
  const togglePasswordButton = document.getElementById("togglePassword");
  const eyeIcon = document.getElementById("eyeIcon");
  const pupil = document.querySelector(".eye-pupil");

  console.log(passwordInput, togglePasswordButton, eyeIcon, pupil);

  togglePasswordButton.addEventListener("click", function () {
      console.log("Toggle password visibility clicked");

      // Toggle password visibility
      const type =
          passwordInput.getAttribute("type") === "password" ? "text" : "password";
      passwordInput.setAttribute("type", type);

      // Animate the eye
      if (type === "text") {
          console.log("Password is now visible");
          // Mata terbuka
          eyeIcon.style.transform = "rotate(0deg) scale(1.2)";
          eyeIcon.classList.add("text-blue-500");
      } else {
          console.log("Password is now hidden");
          // Mata tertutup
          eyeIcon.style.transform = "rotate(-20deg) scale(0.9)";
          eyeIcon.classList.remove("text-blue-500");
      }

      // Reset animasi
      setTimeout(() => {
          eyeIcon.style.transform = "rotate(0deg) scale(1)";
      }, 300);
  });

  // Event listener untuk gerakan mouse yang membuat pupil mengikuti kursor
  document.addEventListener("mousemove", (event) => {
      if (passwordInput.getAttribute("type") === "text") {
          return;
      }

      const rect = eyeIcon.getBoundingClientRect();
      const centerX = rect.left + rect.width / 2;
      const centerY = rect.top + rect.height / 2;

      const deltaX = event.clientX - centerX;
      const deltaY = event.clientY - centerY;

      const angle = Math.atan2(deltaY, deltaX);
      const distance = Math.min(Math.hypot(deltaX, deltaY) / 50, 5);

      const pupilX = Math.cos(angle) * distance;
      const pupilY = Math.sin(angle) * distance;

      pupil.setAttribute("cx", 12 + pupilX);
      pupil.setAttribute("cy", 12 + pupilY);
  });
});
