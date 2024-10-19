var sideBarIsOpen = true;
toggleBtn.addEventListener("click", (event) => {
  event.preventDefault();
  if (sideBarIsOpen) {
    dashboard_sidebar.style.width = "10%";S
    dashboard_sidebar.style.transition = "0.5 all";
    dasboard_content_container.style.width = "90%";
    dashboard_logo.style.fontSize = "60px";
    userImage.style.width = "60px";
    menuIcons = document.getElementsByClassName("menuText");
    for (var i = 0; i < menuIcons.length; i++) {
      menuIcons[i].style.display = "none";
    }
    document.getElementsByClassName(
      "dashboard_menu_ lists"
    )[0].style.textAlign = "center";
  } else {
    dashboard_sidebar.style.width = "10%";
    dasboard_content_container.style.width = "90%";
    dashboard_logo.style.fontSize = "60px";
    userImage.style.width = "80px";
    menuIcons = document.getElementsByClassName("menuText");
    for (var i = 0; i < menuIcons.length; i++) {
      menuIcons[i].style.display = "inline-block";
    }
    document.getElementsByClassName(
      "dashboard_menu_lists"
    )[0].style.textAlign = "normal";
    sideBarIsOpen = true;
  }
});
