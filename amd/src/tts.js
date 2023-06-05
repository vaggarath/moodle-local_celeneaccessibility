export const init = (language) => {
    document.body.addEventListener('contextmenu', (e) => {

        const bodyEl = document.body;

        if (document.getElementById('context-menu')) {
            if (!e.target.classList.contains("item")) {
                // Vérifier qu'on ne click pas sur une option du menu.
                document.getElementById('context-menu').remove();
            }
        }

        if (bodyEl.classList.contains('tts') && isClassForbiddenTts(e)) {
            // Cf celeneaccessibility branch ne sactive que si on a activé l'option dans l'accessibilité.
            e.preventDefault();
            if (e.target.innerText) {
                checkMenu(e);
            } else if (!e.target.innerText || e.target.innerText === "") {
                if (document.getElementById('context-menu')) {
                    document.getElementById('context-menu').remove();
                }
            }
        }

        // créer le context menu
        /**
         *
         * @param {*} event
         */
        function createMenu(event) {
            const synth = window.speechSynthesis;
            const { clientX: mouseX, clientY: mouseY } = event;

            const utterThis = new SpeechSynthesisUtterance(event.target.innerText);
            const targetInnerHtml = event.target.innerHTML;

            const contextMenu = document.createElement('div');
            contextMenu.id = "context-menu";
            const contextMenuItemFirst = document.createElement('div');
            contextMenuItemFirst.id = "item1";
            contextMenuItemFirst.innerText = "Lire pour moi (audio)";
            contextMenuItemFirst.classList.add('item');
            contextMenuItemFirst.onclick = () => {
                e.preventDefault();
                createOptionsBar(event);
                // Default 'fr-FR';
                utterThis.lang = language && language === "french"
                    ? "fr-FR"
                    : language && language === "english"
                        ? "en-US"
                        : "fr-FR";
                utterThis.rate = 1;
                utterThis.pitch = 1;
                synth.speak(utterThis);

                // Const words = event.target.innerText.split(" ");
                utterThis.addEventListener('boundary', (e) => {
                    if (e.name === 'sentence') {
                        // We only care about word boundaries.
                        return;
                    }

                    const wordStart = e.charIndex;
                    let wordLength = e.charLength;
                    if (wordLength === undefined) {
                        // Safari.
                        const match = event.target.innerText.substring(wordStart).match(/^[a-z\d']*/i);
                        wordLength = match[0].length;
                    }
                    // Wrap word in <mark> tag.
                    const wordEnd = wordStart + wordLength;
                    const word = event.target.innerText.substring(wordStart, wordEnd);
                    let markedText = event.target.innerText.substring(0, wordStart);
                    markedText += '<mark>' + word + '</mark>';
                    markedText += event.target.innerText.substring(wordEnd);

                    event.target.innerHTML = markedText;
                });


                event.target.classList.add("highlight");
                contextMenu.remove();

                utterThis.addEventListener('end', () => { //les events se mettent sur l'utterance
                    document.querySelectorAll("mark").forEach(div => {
                        const span = document.createElement("span");
                        span.innerText = div.innerText;
                        div.replaceWith(span);
                    });
                    event.target.classList.remove("highlight");
                    event.target.innerHTML = targetInnerHtml;
                    // Pause.remove();
                    removeOptionsBar();
                });
            };
            const contextMenuItemSecond = document.createElement('div');
            contextMenuItemSecond.id = "item2";
            contextMenuItemSecond.innerText = "copier";
            contextMenuItemSecond.classList.add('item');
            contextMenuItemSecond.onclick = (e) => {
                e.preventDefault();
                navigator.clipboard.writeText(event.target.innerText).then(() => {
                    new Toast("Texte copié : " + "\n" + event.target.innerText, "#00b894", 2500);
                    contextMenu.remove();
                });
            };

            const contextMenuItemFifth = document.createElement('div');
            contextMenuItemFifth.classList.add('item');
            contextMenuItemFifth.innerText = "Inverser les couleurs (alpha)";
            contextMenuItemFifth.onclick = () => {
                event.preventDefault();
                const elementToChange = event.target;
                elementToChange.style.filter = elementToChange.style.filter === "invert(1)" ? "invert(0)" : "invert(1)";
                contextMenu.remove();
            };

            const contextMenuItemSixth = document.createElement('div');
            contextMenuItemSixth.classList.add('item');
            contextMenuItemSixth.innerText = "Recharger la page";
            contextMenuItemSixth.onclick = () => {
                event.preventDefault();
                document.location.reload();
            };

            let contextMenuItemThird = null;
            if (typeof window.getSelection !== "undefined" && window.getSelection !== "") {
                const text = getSelectedText();
                if (text && text !== "") {
                    contextMenuItemThird = document.createElement('div');
                    contextMenuItemThird.innerText = "copier la selection";
                    contextMenuItemThird.classList.add('item');
                    contextMenuItemThird.onclick = (e) => {
                        e.preventDefault();
                        new Toast("Sélection copiée : " + "\n" + text, "#00b894", 2500);
                        navigator.clipboard.writeText(text).then(() => {
                            contextMenu.remove();
                        });
                    };
                }
            }

            const contextMenuItemFourth = document.createElement('div');
            contextMenuItemFourth.innerText = "Tout sélectionner";
            contextMenuItemFourth.classList.add('item');
            contextMenuItemFourth.onclick = (e) => {
                e.preventDefault();
                const doc = document.body;
                let range, selection;
                selection = window.getSelection();
                range = document.createRange();
                range.selectNodeContents(doc);
                selection.removeAllRanges();
                selection.addRange(range);
                contextMenu.remove();
            };

            // Titre to append.
            const contextTitle = document.createElement('p');
            contextTitle.innerText = "Options";
            contextTitle.classList.add('contextTitle', 'text-center');
            // ContextTitle.prepend(logo); //on ajoute le logo celene;

            // Append.
            contextMenu.append(contextTitle);
            contextMenu.append(contextMenuItemFirst);
            contextMenu.append(contextMenuItemSecond);
            if (!typeof window.getSelection !== "undefined" && contextMenuItemThird) {
                contextMenu.append(contextMenuItemThird);
            }
            contextMenu.append(contextMenuItemFourth);

            contextMenu.append(contextMenuItemSixth);
            document.body.append(contextMenu);

            const posX = window.innerWidth - mouseX >= 250 ? mouseX : mouseX - 200;
            const posY = window.innerHeight - mouseY >= 200 ? mouseY : mouseY - 200;

            contextMenu.style.top = `${posY}px`;
            contextMenu.style.left = `${posX}px`;
        }


        /**
         *
         * @returns selected text
         */
        function getSelectedText() {
            // Check si du text est surligné, si oui le récupérer pour permettre;
            // Une copie plus étendu que le event.target (copier la selection);
            let text = "";
            if (typeof window.getSelection != "undefined") {
                text = window.getSelection().toString();
            } else if (typeof document.selection != "undefined" && document.selection.type == "Text") {
                text = document.selection.createRange().text;
            }
            return text;
        }


        // Vérifier que le menu existe. S'il existe on le supprime et on le recréé;
        /**
         *
         * @param {*} e = event
         */
        function checkMenu(e) {
            const words = e.target.innerText.split(" ");
            if (document.getElementById('context-menu')) {
                document.getElementById('context-menu').remove();
                createMenu(e, words);
            } else {
                createMenu(e, words);
            }
        }

        /**
         *
         * @return bar
         */
        function createOptionsBar() {
            const bar = document.createElement('div');
            bar.classList.add('options-bar');
            bar.id = "options-bar";

            //bouton pour arrêter
            const play = document.createElement('button');
            // play.innerHTML = "<span>ARRÊTER</span>";
            const spanArret = document.createElement('span');
            spanArret.innerText = "ARRÊTER";
            play.append(spanArret);
            play.classList.add('play-btn');
            play.onclick = (e) => {
                e.preventDefault();
                if (window.speechSynthesis.speaking) {
                    window.speechSynthesis.cancel(); //on arrête
                }
            };

            const pause = document.createElement('button');
            const spanPause = document.createElement('span');
            spanPause.innerText = "PAUSE";
            pause.append(spanPause);
            pause.classList.add('play-btn');
            pause.onclick = (e) => {
                e.preventDefault();
                if (window.speechSynthesis.speaking && spanPause.innerText === "PAUSE") {
                    window.speechSynthesis.pause();
                    spanPause.innerText = "REPRENDRE";
                } else if (window.speechSynthesis.paused && spanPause.innerText === "REPRENDRE") {
                    window.speechSynthesis.resume();
                    spanPause.innerText = "PAUSE";
                }
            };

            bar.append(play);
            bar.append(pause);
            document.body.append(bar);
        }

        /**
         * @return remove options bar
         */
        function removeOptionsBar() {
            if (document.getElementById('options-bar')) {
                document.getElementById('options-bar').remove();
            }
        }
    });

    const isClassForbiddenTts = (element) => {
        // Liste des divs sur lesquelles on ne veut surtout pas changer la MEP avec le TTS.
        let doNotInclude;
        const divToNotInclude = [
            "generalbox",
            "secondary-navigation",
            "navbar",
            "nav",
            "drawers",
            "completion-info",
            "card"
        ];
        for (let i = 0; i < divToNotInclude.length; i++) {
            if (
                element.target.classList.contains(divToNotInclude[i]) ||
                (element.target.getAttribute('role') && element.target.getAttribute('role') === "main")
            ) {
                return false;
            } else {
                doNotInclude = true;
            }
        }
        return doNotInclude;
    };

    // Virer le menu sur un click simple.
    document.body.addEventListener('click', (e) => {
        if (document.getElementById('context-menu')) {
            if (!e.target.classList.contains("item")) { //vérifier qu'on ne click pas sur une option du menu
                document.getElementById('context-menu').remove();
            }
        }
    });

    // Generation of a toast message to indicate : The copy has been done. The content of what was copied.
    class Toast {
        constructor(textToDisplay, color, time) {
            this.message = textToDisplay;
            this.color = color;
            this.time = time;
            this.element = null;

            const element = document.createElement('div');
            element.className = "toast-notification";
            this.element = element;
            const countElements = document.getElementsByClassName("toast-notification");

            element.style.opacity = 0.8;

            element.style.marginBottom = (countElements.length * 55) + "px";

            element.style.backgroundColor = this.color;

            const message = document.createElement("div");
            message.className = "message-container";
            message.textContent = this.message;

            element.appendChild(message);

            const close = document.createElement("div");
            close.className = "close-notification";

            const icon = document.createElement("i");
            icon.className = "lni lni-close";

            close.appendChild(icon);

            element.append(close);

            document.body.appendChild(element);

            setTimeout(function () {
                element.remove();
            }, this.time); // Do not change time here, check the construct function. It shall be a parameter.

            close.addEventListener("click", () => {// If user wants to close before timeout.
                element.remove();
            });
        }
    }
};
