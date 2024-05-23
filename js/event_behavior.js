function view_event(element) {
  const event_detail = element.nextElementSibling;

  // event_detail.style.display = "none";

  // let content = event_detail.textContent;
  // alert(`hello ${content}`);
  element.style.transform = "rotate(90deg)";
  if ((event_detail.style.display = "none")) {
    event_detail.style.display = "flex";
  } else {
    event_detail.style.display = "none";
  }
  // event_detail.classList.toggle("show-event");
}
