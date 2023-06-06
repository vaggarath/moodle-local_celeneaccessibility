define(['jquery', 'core/log'], function(jQuery, log) {

  "use strict";

  log.debug('Celene 4 Boost mode.js function called');

  // Make the DIV element draggable:
  if (document.getElementById('readingLine')) {
    dragElement(document.getElementById("readingLine"));
  }

  let guidingLine;

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {

      if (document.getElementById('readingLine') && document.getElementById('readingLine').classList.contains('d-none')) {
        document.getElementById('readingLine').classList.remove('d-none');
      }
      // If esc key was not pressed in combination with ctrl or alt or shift;
      const isNotCombinedKey = !(event.ctrlKey || event.altKey || event.shiftKey);
      if (isNotCombinedKey
        && document.getElementById("readingLine")
        && !document.getElementById("reading-line").classList.contains('d-none')
      ) {
        guidingLine = document.getElementById("reading-line");
        document.getElementById("reading-line").remove();
      } else if (isNotCombinedKey
        && document.getElementById("readingLine")
        && document.getElementById("reading-line").classList.contains('d-none')
      ) {
        if (document.getElementById('reading-line') && document.getElementById('reading-line').classList.contains('d-none')) {
          document.getElementById('reading-line').classList.remove('d-none');
        }
      } else {
        if (guidingLine !== null && guidingLine !== undefined) {
          document.body.append(guidingLine);
        }
      }

      /**
       *
       * @param {*} div name of the div
       */
      const makeResizableDiv = (div) => {
        const element = document.querySelector(div);
        const resizers = document.querySelectorAll(div + ' .resizer');
        const minimum_size = 20;
        let original_height = 0;
        let original_y = 0;
        let original_mouse_y = 0;

        /**
         *
         * @param {*} val
         */
        const newVal = (val) => {
          original_height = parseFloat(getComputedStyle(element, null).getPropertyValue('height').replace('px', ''));
          original_y = element.getBoundingClientRect().top;
          original_mouse_y = val.pageY;
        };

          /**
           *
           * @param {*} e
           * @param {*} currentResizer
           */
           const resize = (e, currentResizer) => {
            newVal(e);
            if (currentResizer.classList.contains('bottom-right')) {
              const height = original_height + (e.pageY - original_mouse_y);
              if (height > minimum_size) {
                element.style.height = height + 'px';
              }
            }
            else if (currentResizer.classList.contains('bottom-left')) {
              const height = original_height + (e.pageY - original_mouse_y);
              if (height > minimum_size) {
                element.style.height = height + 'px';
              }
            }
            else if (currentResizer.classList.contains('top-right')) {
              const height = original_height - (e.pageY - original_mouse_y);
              if (height > minimum_size) {
                element.style.height = height + 'px';
                element.style.top = original_y + (e.pageY - original_mouse_y) + 'px';
              }
            }
            else {
              const height = original_height - (e.pageY - original_mouse_y);
              if (height > minimum_size) {
                element.style.height = height + 'px';
                element.style.top = original_y + (e.pageY - original_mouse_y) + 'px';
              }
            }
          };

          /**
           *
           */
          const stopResize = () => {
            window.removeEventListener('mousemove', resize);
          };

        for (let i = 0; i < resizers.length; i++) {
          const currentResizer = resizers[i];

          currentResizer.addEventListener('mousedown', (e) => {
            e.preventDefault();
            newVal(e);
            window.addEventListener('mousemove', resize(e, currentResizer));
            window.addEventListener('mouseup', stopResize);
          });
        }
      };
      makeResizableDiv('#readingLine');
    }
  });

  /**
   *
   * @param {*} elmnt
   */
  function dragElement(elmnt) {
    var pos2 = 0, pos4 = 0; // Pos1 = 0, pos3 = 0,
    if (document.getElementById(elmnt.id + "header")) {
      // If present, the header is where you move the DIV from:
      document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
    } else {
      // Otherwise, move the DIV from anywhere inside the DIV:
      elmnt.onmousedown = dragMouseDown;
    }
    /**
     *
     * @param {*} e
     */
    function dragMouseDown(e) {
      e = e || window.event;
      e.preventDefault();
      // Get the mouse cursor position at startup:
      pos4 = e.clientY;
      document.onmouseup = closeDragElement;
      // Call a function whenever the cursor moves:
      document.onmousemove = elementDrag;
    }
    /**
     *
     * @param {*} e
     */
    function elementDrag(e) {
      e = e || window.event;
      e.preventDefault();
      // Calculate the new cursor position:
      pos2 = pos4 - e.clientY;
      pos4 = e.clientY;
      // Set the element's new position:
      elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    }
    /**
     *
     */
    function closeDragElement() {
      // Stop moving when mouse button is released:
      document.onmouseup = null;
      document.onmousemove = null;
    }
  }
});