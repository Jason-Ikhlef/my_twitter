const div = $('.newTweetArea');

$(div).on("input", function() {

    $.ajax({

        type: "POST",
        data: "",
        url: "./AJAX/php/do.linkToAt.php",
        success: function(data) {
            if (data) {

                let start = 0;
                const selection = window.getSelection();
                if (selection.rangeCount > 0) {
                    const range = selection.getRangeAt(0);
                    const preSelectionRange = range.cloneRange();
                    preSelectionRange.selectNodeContents(div[0]);
                    preSelectionRange.setEnd(range.startContainer, range.startOffset);
                    start = preSelectionRange.toString().length;
                }

                const content = div.text();
                const words = content.split(" ");
                const newContent = document.createDocumentFragment();

                for (let i = 0; i < words.length; i++) {
                    const word = words[i];
                    if (word.startsWith("@")) {
                        const span = document.createElement("span");
                        span.className = "myAt";
                        span.textContent = word + " ";
                        newContent.appendChild(span);
                    } else {
                        const textNode = document.createTextNode(word + " ");
                        newContent.appendChild(textNode);
                    }
                }

                div.empty();
                div.append(newContent);

                const newSelection = window.getSelection();
                let maxOffset = 0;
                div[0].childNodes.forEach((childNode) => {
                    if (childNode.nodeType === 3) {
                        maxOffset += childNode.length;
                    } else if (childNode.nodeType === 1 && childNode.tagName === "SPAN") {
                        maxOffset += childNode.textContent.length;
                    }
                });

                if (start <= maxOffset) {
                    const newRange = document.createRange();
                    let currentOffset = 0;
                    let foundStart = false;
                    div[0].childNodes.forEach((childNode) => {
                        if (childNode.nodeType === 3) {
                            const length = childNode.length;
                            if (!foundStart && start >= currentOffset && start <= currentOffset + length) {
                                newRange.setStart(childNode, start - currentOffset);
                                foundStart = true;
                            }
                            currentOffset += length;
                        } else if (childNode.nodeType === 1 && childNode.tagName === "SPAN") {
                            const length = childNode.textContent.length;
                            if (!foundStart && start >= currentOffset && start <= currentOffset + length) {
                                newRange.setStart(childNode.firstChild, start - currentOffset);
                                foundStart = true;
                            }
                            currentOffset += length;
                        }
                    });
                    if (!foundStart) {
                        newRange.setStart(div[0], 0);
                    }
                    newRange.collapse(true);
                    newSelection.removeAllRanges();
                    newSelection.addRange(newRange);
                    
                    console.log(data);
                }
                
            } else {
                // pop-up erreur
                alert(data);
            }
        }
    })    
});
