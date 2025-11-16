document.addEventListener("DOMContentLoaded", () => {
  // Mobile menu toggle
  const mobileToggle = document.getElementById("mobileToggle")
  const navMenu = document.getElementById("navMenu")

  if (mobileToggle && navMenu) {
    mobileToggle.addEventListener("click", () => {
      navMenu.classList.toggle("active")
      mobileToggle.classList.toggle("active")
    })
  }

  // Close mobile menu when clicking on links
  const navLinks = document.querySelectorAll(".nav-link")
  navLinks.forEach((link) => {
    link.addEventListener("click", () => {
      if (window.innerWidth <= 768) {
        navMenu.classList.remove("active")
        mobileToggle.classList.remove("active")
      }
    })
  })

  // Navbar scroll effect
  const navbar = document.getElementById("navbar")

  window.addEventListener("scroll", () => {
    if (window.scrollY > 100) {
      navbar.classList.add("scrolled")
    } else {
      navbar.classList.remove("scrolled")
    }
  })

  // Carousel functionality
  const carousel = document.getElementById("carousel")
  if (carousel) {
    const slides = carousel.querySelectorAll(".carousel-slide")
    const prevBtn = document.getElementById("prevBtn")
    const nextBtn = document.getElementById("nextBtn")
    let currentSlide = 0

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.toggle("active", i === index)
      })
    }

    function nextSlide() {
      currentSlide = (currentSlide + 1) % slides.length
      showSlide(currentSlide)
    }

    function prevSlide() {
      currentSlide = (currentSlide - 1 + slides.length) % slides.length
      showSlide(currentSlide)
    }

    if (nextBtn) nextBtn.addEventListener("click", nextSlide)
    if (prevBtn) prevBtn.addEventListener("click", prevSlide)

    // Auto-advance carousel
    setInterval(nextSlide, 6000) // Updated interval to 6 seconds
  }

  // Contact form handling
  const contactForm = document.getElementById("contactForm")
  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      e.preventDefault()

      const submitBtn = this.querySelector(".btn-submit")
      const originalText = submitBtn.innerHTML

      // Show loading state
      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...'
      submitBtn.disabled = true

      // Simulate form submission
      setTimeout(() => {
        showNotification("¡Mensaje enviado exitosamente! Te contactaremos pronto.", "success")
        contactForm.reset()
        submitBtn.innerHTML = originalText
        submitBtn.disabled = false
      }, 2000)
    })
  }

  // Notification system
  function showNotification(message, type = "info") {
    const notification = document.createElement("div")
    notification.className = `notification notification-${type}`
    notification.innerHTML = `
            <div class="notification-content">
                <i class="fas ${type === "success" ? "fa-check-circle" : type === "error" ? "fa-exclamation-circle" : "fa-info-circle"}"></i>
                <span>${message}</span>
                <button class="notification-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `

    // Styles
    Object.assign(notification.style, {
      position: "fixed",
      top: "20px",
      right: "20px",
      background: type === "success" ? "#10b981" : type === "error" ? "#ef4444" : "#3b82f6",
      color: "white",
      padding: "1rem 1.5rem",
      borderRadius: "8px",
      boxShadow: "0 10px 15px -3px rgb(0 0 0 / 0.1)",
      zIndex: "10000",
      transform: "translateX(100%)",
      transition: "transform 0.3s ease",
      maxWidth: "400px",
    })

    const content = notification.querySelector(".notification-content")
    Object.assign(content.style, {
      display: "flex",
      alignItems: "center",
      gap: "0.75rem",
    })

    const closeBtn = notification.querySelector(".notification-close")
    Object.assign(closeBtn.style, {
      background: "none",
      border: "none",
      color: "white",
      cursor: "pointer",
      padding: "0",
      marginLeft: "auto",
    })

    document.body.appendChild(notification)

    // Show notification
    setTimeout(() => {
      notification.style.transform = "translateX(0)"
    }, 100)

    // Auto hide
    setTimeout(() => {
      notification.style.transform = "translateX(100%)"
      setTimeout(() => notification.remove(), 300)
    }, 5000)

    // Close button
    closeBtn.addEventListener("click", () => {
      notification.style.transform = "translateX(100%)"
      setTimeout(() => notification.remove(), 300)
    })
  }

  // Smooth scrolling for anchor links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault()
      const target = document.querySelector(this.getAttribute("href"))
      if (target) {
        const offsetTop = target.offsetTop - 80 // Account for navbar
        window.scrollTo({
          top: offsetTop,
          behavior: "smooth",
        })
      }
    })
  })

  // Animation on scroll
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = "1"
        entry.target.style.transform = "translateY(0)"
      }
    })
  }, observerOptions)

  // Observe elements for animation
  const animatedElements = document.querySelectorAll(".program-card, .stat-item")
  animatedElements.forEach((el) => {
    el.style.opacity = "0"
    el.style.transform = "translateY(30px)"
    el.style.transition = "opacity 0.6s ease-out, transform 0.6s ease-out"
    observer.observe(el)
  })
})

// Password toggle functionality
function togglePassword(fieldId) {
  const field = document.getElementById(fieldId)
  const toggle = field.nextElementSibling
  const icon = toggle.querySelector("i")

  if (field.type === "password") {
    field.type = "text"
    icon.classList.remove("fa-eye")
    icon.classList.add("fa-eye-slash")
  } else {
    field.type = "password"
    icon.classList.remove("fa-eye-slash")
    icon.classList.add("fa-eye")
  }
}

// Password strength checker
function checkPasswordStrength(password) {
  let strength = 0
  const feedback = []

  if (password.length >= 8) strength += 1
  else feedback.push("Al menos 8 caracteres")

  if (/[A-Z]/.test(password)) strength += 1
  else feedback.push("Una letra mayúscula")

  if (/[a-z]/.test(password)) strength += 1
  else feedback.push("Una letra minúscula")

  if (/[0-9]/.test(password)) strength += 1
  else feedback.push("Un número")

  if (/[^A-Za-z0-9]/.test(password)) strength += 1
  else feedback.push("Un carácter especial")

  return { strength, feedback }
}

// Update password strength indicator
function updatePasswordStrength(password) {
  const strengthBar = document.querySelector(".strength-fill")
  const strengthText = document.querySelector(".strength-text")
  const requirements = document.querySelectorAll(".password-requirements li")

  if (!strengthBar) return

  const { strength } = checkPasswordStrength(password)
  const percentage = (strength / 5) * 100

  strengthBar.style.width = percentage + "%"

  if (strength === 0) {
    strengthBar.style.background = "#ef4444"
    strengthText.textContent = "Muy débil"
  } else if (strength <= 2) {
    strengthBar.style.background = "#f59e0b"
    strengthText.textContent = "Débil"
  } else if (strength <= 3) {
    strengthBar.style.background = "#eab308"
    strengthText.textContent = "Regular"
  } else if (strength <= 4) {
    strengthBar.style.background = "#22c55e"
    strengthText.textContent = "Fuerte"
  } else {
    strengthBar.style.background = "#10b981"
    strengthText.textContent = "Muy fuerte"
  }

  // Update requirements checklist
  if (requirements.length > 0) {
    const checks = [
      password.length >= 8,
      /[A-Z]/.test(password),
      /[a-z]/.test(password),
      /[0-9]/.test(password),
      /[^A-Za-z0-9]/.test(password),
    ]

    requirements.forEach((req, index) => {
      if (checks[index]) {
        req.classList.add("valid")
      } else {
        req.classList.remove("valid")
      }
    })
  }
}

// Authentication form handlers
document.addEventListener("DOMContentLoaded", () => {
  // Login form
  const loginForm = document.getElementById("loginForm")
  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      e.preventDefault()

      const submitBtn = this.querySelector(".btn-auth")
      const originalText = submitBtn.innerHTML

      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Iniciando sesión...'
      submitBtn.disabled = true

      setTimeout(() => {
        showNotification("¡Inicio de sesión exitoso! Redirigiendo...", "success")
        setTimeout(() => {
          window.location.href = "index.html"
        }, 1500)
      }, 2000)
    })
  }

  // Register form
  const registerForm = document.getElementById("registerForm")
  if (registerForm) {
    registerForm.addEventListener("submit", function (e) {
      e.preventDefault()

      const password = this.querySelector("#password").value
      const confirmPassword = this.querySelector("#confirmPassword").value

      if (password !== confirmPassword) {
        showNotification("Las contraseñas no coinciden", "error")
        return
      }

      const submitBtn = this.querySelector(".btn-auth")
      const originalText = submitBtn.innerHTML

      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Creando cuenta...'
      submitBtn.disabled = true

      setTimeout(() => {
        showNotification("¡Cuenta creada exitosamente! Revisa tu email para activarla.", "success")
        setTimeout(() => {
          window.location.href = "login.html"
        }, 2000)
      }, 2000)
    })
  }

  // Forgot password form
  const forgotPasswordForm = document.getElementById("forgotPasswordForm")
  if (forgotPasswordForm) {
    forgotPasswordForm.addEventListener("submit", function (e) {
      e.preventDefault()

      const submitBtn = this.querySelector(".btn-auth")
      const originalText = submitBtn.innerHTML

      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...'
      submitBtn.disabled = true

      setTimeout(() => {
        showNotification("¡Instrucciones enviadas! Revisa tu email.", "success")
        submitBtn.innerHTML = originalText
        submitBtn.disabled = false
        this.reset()
      }, 2000)
    })
  }

  // Reset password form
  const resetPasswordForm = document.getElementById("resetPasswordForm")
  if (resetPasswordForm) {
    const newPasswordField = document.getElementById("newPassword")
    const confirmPasswordField = document.getElementById("confirmNewPassword")

    if (newPasswordField) {
      newPasswordField.addEventListener("input", function () {
        updatePasswordStrength(this.value)
      })
    }

    resetPasswordForm.addEventListener("submit", function (e) {
      e.preventDefault()

      const newPassword = newPasswordField.value
      const confirmPassword = confirmPasswordField.value

      if (newPassword !== confirmPassword) {
        showNotification("Las contraseñas no coinciden", "error")
        return
      }

      const { strength } = checkPasswordStrength(newPassword)
      if (strength < 3) {
        showNotification("La contraseña debe ser más segura", "error")
        return
      }

      const submitBtn = this.querySelector(".btn-auth")
      const originalText = submitBtn.innerHTML

      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Cambiando contraseña...'
      submitBtn.disabled = true

      setTimeout(() => {
        showNotification("¡Contraseña cambiada exitosamente!", "success")
        setTimeout(() => {
          window.location.href = "login.html"
        }, 1500)
      }, 2000)
    })
  }
})

// Enhanced notification system for auth
function showNotification(message, type = "info") {
  const notification = document.createElement("div")
  notification.className = `notification notification-${type}`
  notification.innerHTML = `
    <div class="notification-content">
      <i class="fas ${type === "success" ? "fa-check-circle" : type === "error" ? "fa-exclamation-circle" : "fa-info-circle"}"></i>
      <span>${message}</span>
      <button class="notification-close">
        <i class="fas fa-times"></i>
      </button>
    </div>
  `

  // Styles
  Object.assign(notification.style, {
    position: "fixed",
    top: "20px",
    right: "20px",
    background: type === "success" ? "#10b981" : type === "error" ? "#ef4444" : "#3b82f6",
    color: "white",
    padding: "1rem 1.5rem",
    borderRadius: "8px",
    boxShadow: "0 10px 15px -3px rgb(0 0 0 / 0.1)",
    zIndex: "10000",
    transform: "translateX(100%)",
    transition: "transform 0.3s ease",
    maxWidth: "400px",
  })

  const content = notification.querySelector(".notification-content")
  Object.assign(content.style, {
    display: "flex",
    alignItems: "center",
    gap: "0.75rem",
  })

  const closeBtn = notification.querySelector(".notification-close")
  Object.assign(closeBtn.style, {
    background: "none",
    border: "none",
    color: "white",
    cursor: "pointer",
    padding: "0",
    marginLeft: "auto",
  })

  document.body.appendChild(notification)

  // Show notification
  setTimeout(() => {
    notification.style.transform = "translateX(0)"
  }, 100)

  // Auto hide
  setTimeout(() => {
    notification.style.transform = "translateX(100%)"
    setTimeout(() => notification.remove(), 300)
  }, 5000)

  // Close button
  closeBtn.addEventListener("click", () => {
    notification.style.transform = "translateX(100%)"
    setTimeout(() => notification.remove(), 300)
  })
}

// Función para toggle del curriculum (para páginas de carreras) - Versión flexible
function toggleCurriculum(yearId) {
  const content = document.getElementById(yearId)
  const button = content.previousElementSibling
  const icon = button.querySelector("i")

  if (content.classList.contains("active")) {
    // Cerrar: primero obtener la altura actual y luego animar a 0
    const currentHeight = content.scrollHeight + "px"
    content.style.maxHeight = currentHeight

    // Forzar un reflow para que el navegador registre la altura actual
    content.offsetHeight

    // Animar a 0
    content.style.maxHeight = "0px"
    content.classList.remove("active")
    icon.style.transform = "rotate(0deg)"

    // Limpiar el estilo inline después de la transición
    setTimeout(() => {
      if (!content.classList.contains("active")) {
        content.style.maxHeight = ""
      }
    }, 300)
  } else {
    // Cerrar otros años abiertos primero
    document.querySelectorAll(".curriculum-content.active").forEach((item) => {
      const otherButton = item.previousElementSibling
      const otherIcon = otherButton.querySelector("i")

      // Animar el cierre
      const currentHeight = item.scrollHeight + "px"
      item.style.maxHeight = currentHeight
      item.offsetHeight // Forzar reflow
      item.style.maxHeight = "0px"
      item.classList.remove("active")
      otherIcon.style.transform = "rotate(0deg)"

      // Limpiar después de la transición
      setTimeout(() => {
        if (!item.classList.contains("active")) {
          item.style.maxHeight = ""
        }
      }, 300)
    })

    // Abrir el seleccionado: calcular altura automáticamente
    const targetHeight = content.scrollHeight + "px"
    content.style.maxHeight = "0px"
    content.classList.add("active")

    // Forzar un reflow y luego animar a la altura real
    content.offsetHeight
    content.style.maxHeight = targetHeight
    icon.style.transform = "rotate(180deg)"

    // Después de la transición, permitir crecimiento natural
    setTimeout(() => {
      if (content.classList.contains("active")) {
        content.style.maxHeight = "none"
      }
    }, 300)
  }
}
