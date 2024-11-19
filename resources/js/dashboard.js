let popperInstances = {};

function initializeDashboard() {
    // Sidebar code (unchanged)
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const sidebarOverlay = document.querySelector('.sidebar-overlay');
    const sidebarMenu = document.querySelector('.sidebar-menu');
    const main = document.querySelector('.main');
    
    if (sidebarToggle && sidebarOverlay && sidebarMenu && main) {
        sidebarToggle.addEventListener('click', function (e) {
            e.preventDefault();
            main.classList.toggle('active');
            sidebarOverlay.classList.toggle('hidden');
            sidebarMenu.classList.toggle('-translate-x-full');
        });
        sidebarOverlay.addEventListener('click', function (e) {
            e.preventDefault();
            main.classList.add('active');
            sidebarOverlay.classList.add('hidden');
            sidebarMenu.classList.add('-translate-x-full');
        });
    }
    
    document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (item) {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            const parent = item.closest('.group');
            if (parent.classList.contains('selected')) {
                parent.classList.remove('selected');
            } else {
                document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (i) {
                    i.closest('.group').classList.remove('selected');
                });
                parent.classList.add('selected');
            }
        });
    });

    // Popper code
    // Destroy existing Popper instances
    Object.values(popperInstances).forEach(instance => {
        instance.destroy();
    });
    popperInstances = {};

    document.querySelectorAll('.dropdown').forEach(function (item, index) {
        const popperId = 'popper-' + index;
        const toggle = item.querySelector('.dropdown-toggle');
        const menu = item.querySelector('.dropdown-menu');
        menu.dataset.popperId = popperId;
        popperInstances[popperId] = Popper.createPopper(toggle, menu, {
            modifiers: [
                {
                    name: 'offset',
                    options: {
                        offset: [0, 8],
                    },
                },
                {
                    name: 'preventOverflow',
                    options: {
                        padding: 24,
                    },
                },
            ],
            placement: 'bottom-end'
        });
    });
    
    document.addEventListener('click', function (e) {
        const toggle = e.target.closest('.dropdown-toggle');
        const menu = e.target.closest('.dropdown-menu');
        if (toggle) {
            const menuEl = toggle.closest('.dropdown').querySelector('.dropdown-menu');
            const popperId = menuEl.dataset.popperId;
            if (menuEl.classList.contains('hidden')) {
                hideDropdown();
                menuEl.classList.remove('hidden');
                showPopper(popperId);
            } else {
                menuEl.classList.add('hidden');
                hidePopper(popperId);
            }
        } else if (!menu) {
            hideDropdown();
        }
    });

    function hideDropdown() {
        document.querySelectorAll('.dropdown-menu').forEach(function (item) {
            item.classList.add('hidden');
        });
    }

    function showPopper(popperId) {
        if (popperInstances[popperId]) {
            popperInstances[popperId].setOptions(function (options) {
                return {
                    ...options,
                    modifiers: [
                        ...options.modifiers,
                        { name: 'eventListeners', enabled: true },
                    ],
                }
            });
            popperInstances[popperId].update();
        }
    }

    function hidePopper(popperId) {
        if (popperInstances[popperId]) {
            popperInstances[popperId].setOptions(function (options) {
                return {
                    ...options,
                    modifiers: [
                        ...options.modifiers,
                        { name: 'eventListeners', enabled: false },
                    ],
                }
            });
        }
    }

    // Tab code (unchanged)
    document.querySelectorAll('[data-tab]').forEach(function (item) {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            const tab = item.dataset.tab;
            const page = item.dataset.tabPage;
            const target = document.querySelector('[data-tab-for="' + tab + '"][data-page="' + page + '"]');
            document.querySelectorAll('[data-tab="' + tab + '"]').forEach(function (i) {
                i.classList.remove('active');
            });
            document.querySelectorAll('[data-tab-for="' + tab + '"]').forEach(function (i) {
                i.classList.add('hidden');
            });
            item.classList.add('active');
            target.classList.remove('hidden');
        });
    });

    // Chart code (unchanged)
    const orderChart = document.getElementById('order-chart');
    if (orderChart) {
        new Chart(orderChart, {
            type: 'line',
            data: {
                labels: generateNDays(7),
                datasets: [
                    {
                        label: 'Active',
                        data: generateRandomData(7),
                        borderWidth: 1,
                        fill: true,
                        pointBackgroundColor: 'rgb(59, 130, 246)',
                        borderColor: 'rgb(59, 130, 246)',
                        backgroundColor: 'rgb(59 130 246 / .05)',
                        tension: .2
                    },
                    {
                        label: 'Completed',
                        data: generateRandomData(7),
                        borderWidth: 1,
                        fill: true,
                        pointBackgroundColor: 'rgb(16, 185, 129)',
                        borderColor: 'rgb(16, 185, 129)',
                        backgroundColor: 'rgb(16 185 129 / .05)',
                        tension: .2
                    },
                    {
                        label: 'Canceled',
                        data: generateRandomData(7),
                        borderWidth: 1,
                        fill: true,
                        pointBackgroundColor: 'rgb(244, 63, 94)',
                        borderColor: 'rgb(244, 63, 94)',
                        backgroundColor: 'rgb(244 63 94 / .05)',
                        tension: .2
                    },
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function generateNDays(n) {
        const data = [];
        for (let i = 0; i < n; i++) {
            const date = new Date();
            date.setDate(date.getDate() - i);
            data.push(date.toLocaleString('en-US', {
                month: 'short',
                day: 'numeric'
            }));
        }
        return data;
    }

    function generateRandomData(n) {
        const data = [];
        for (let i = 0; i < n; i++) {
            data.push(Math.round(Math.random() * 10));
        }
        return data;
    }
}

// Initial call for initial page load
document.addEventListener('DOMContentLoaded', function () {
    initializeDashboard();
});

// Add Livewire hooks to reinitialize on component updates
document.addEventListener('livewire:load', function () {
    initializeDashboard();
});

Livewire.hook('message.processed', function (message, component) {
    initializeDashboard();
});
