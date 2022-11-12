import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook("message.processed", (message, component) => {
        const url = new URL(location.href);
        url.searchParams.delete("Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware");
        history.pushState(null, null, url);
    });
});
