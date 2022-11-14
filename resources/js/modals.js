$(function () {
    const modalsElement = $("#laravel-livewire-modals");

    modalsElement.on("hidden.bs.modal", () => {
        Livewire.emit("resetModal");
    });

    Livewire.on("showBootstrapModal", () => {
        const modal = modalsElement.modal();
        modal.show();
    });

    Livewire.on("hideModal", () => {
        modalsElement.modal("hide");
    });
});
