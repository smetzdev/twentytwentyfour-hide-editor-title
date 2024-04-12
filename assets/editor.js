wp.domReady(() => {
  /**
   * Conditionally add/remove body class "het-template-hides-title" of the gutenberg iframe
   * wheather the current template is "No Title" or not.
   */
  const ttf_het_conditionalBodyClass = () => {
    const currentTemplate = wp.data
      .select("core/editor")
      .getEditedPostAttribute("template");

    // Gutenberg editor runs in an iframe
    const iframe = document.querySelector('iframe[name="editor-canvas"]');
    const iframe_body = iframe?.contentWindow?.document?.body;

    if (iframe_body) {
      const ttf_het_class_name = "ttf-het-template-hides-title";

      if (currentTemplate === "page-no-title") {
        iframe_body.classList.add(ttf_het_class_name);
      } else {
        iframe_body.classList.remove(ttf_het_class_name);
      }
    }
  };

  // Runs on init and on every change in the editor
  wp.data.subscribe(ttf_het_conditionalBodyClass);
});
