document.addEventListener("DOMContentLoaded", () => {
  const openModals = document.querySelectorAll(".open-modal")
  const modals = document.querySelectorAll(".modal")
  const [mainModal, waitingModal, leaveModal] = modals

  // localstorage
  if (
    localStorage.getItem("leaveModalClose") === null &&
    localStorage.getItem("leaveModalClose") !== "false"
  ) {
    localStorage.setItem("leaveModalClose", "true")
  }

  if (
    localStorage.getItem("waitingModalClose") === null &&
    localStorage.getItem("waitingModalClose") !== "false"
  ) {
    localStorage.setItem("waitingModalClose", "true")
  }
  // Main modal with form
  openModals.forEach((openModal) => {
    openModal.addEventListener("click", () => {
      mainModal.classList.add("open")
    })
  })

  document.querySelectorAll(".modal").forEach((modal) => {
    modal.addEventListener("click", (e) => {
      if (e.target === modal || e.target.classList.contains("modal__close")) {
        modal.classList.remove("open")
      }
    })
  })

  // Modal starts when you try to leave the site
  document.addEventListener("mousemove", (e) => {
    if (localStorage.getItem("leaveModalClose") === "true" && e.clientY <= 20) {
      localStorage.setItem("leaveModalClose", "false")
      leaveModal.classList.add("open")
    }
  })

  // Modal starts every 3 minutes
  setTimeout(() => {
    if (localStorage.getItem("waitingModalClose") === "true") {
      waitingModal.classList.add("open")
      localStorage.setItem("waitingModalClose", "false")
    }
  }, 180000)
})
