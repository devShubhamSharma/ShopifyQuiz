const devtools = {
    isOpen: false,
    orientation: undefined,
};

const threshold = 160;

const emitEvent = (isOpen, orientation) => {
    globalThis.dispatchEvent(new globalThis.CustomEvent('devtoolschange', {
        detail: {
            isOpen,
            orientation,
        },
    }));
};

const main = ({
    emitEvents = true
} = {}) => {
    const widthThreshold = globalThis.outerWidth - globalThis.innerWidth > threshold;
    const heightThreshold = globalThis.outerHeight - globalThis.innerHeight > threshold;
    const orientation = widthThreshold ? 'vertical' : 'horizontal';

    if (!(heightThreshold && widthThreshold) &&
        ((globalThis.Firebug && globalThis.Firebug.chrome && globalThis.Firebug.chrome.isInitialized) || widthThreshold || heightThreshold)
    ) {
        if ((!devtools.isOpen || devtools.orientation !== orientation) && emitEvents) {
            emitEvent(true, orientation);
        }

        devtools.isOpen = true;
        devtools.orientation = orientation;
    } else {
        if (devtools.isOpen && emitEvents) {
            emitEvent(false, undefined);
        }

        devtools.isOpen = false;
        devtools.orientation = undefined;
    }
};

main({
    emitEvents: false
});
setInterval(main, 500);

if (devtools.isOpen) {
    validateWindow()
}
window.addEventListener('devtoolschange', event => {
    if (event.detail.isOpen) {
        validateWindow()
    }
});

function validateWindow() {
    $(".test-message").children().removeClass('alert-success').addClass("alert-danger");
    $(".test-message").children().html("Error! : Dev tool opened.");
    $(".test-message").removeClass("d-none");
    $(".countdown-timer").remove();
    $("#quiz-div").remove();
}
/**@abstract DETECT REFRESH PAGE */