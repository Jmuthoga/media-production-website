/* Immediately Init AOS */
AOS.init({
    duration: 700,
    easing: "ease-out-cubic",
    once: false,
    mirror: false,
});

/* ---------------------------
       Swiper (angles) init
       --------------------------- */
const swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 12,
    loop: false,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        320: {
            slidesPerView: 1.2,
        },
        560: {
            slidesPerView: 2.2,
        },
        900: {
            slidesPerView: 3.2,
        },
    },
});

/* ---------------------------
       Live UI Simulation + Interactivity
       --------------------------- */
(function () {
    "use strict";

    // helpers
    const $ = (s, r = document) => r.querySelector(s);
    const $$ = (s, r = document) =>
        Array.from((r || document).querySelectorAll(s));
    const fmt = (n) => (typeof n === "number" ? n.toLocaleString() : n);

    // state
    const state = {
        viewers: 1200 + Math.floor(Math.random() * 8600),
        likes: 200 + Math.floor(Math.random() * 1200),
        chats: 30 + Math.floor(Math.random() * 220),
        auto: true,
    };

    // elements
    const ovViewCount = $("#ovViewCount");
    const ovLikeCount = $("#ovLikeCount");
    const viewerCount = $("#viewerCount");
    const miniView = $("#miniViewers");
    const metricViews = $("#metricViews");
    const metricLikes = $("#metricLikes");
    const metricChats = $("#metricChats");
    const chatPreview = $("#chatPreview");
    const chatCount = $("#chatCount");
    const btnSendChat = $("#btnSendChat");
    const chatInput = $("#chatInput");
    const likeBtns = $$(".reaction");
    const joinBtn = $("#btnJoinStream");
    const btnJoinStream = $("#btnJoinStream");
    const qualityBadge = $("#qualityBadge");
    const latencyBadge = $("#latencyBadge");
    const streamStatus = $("#streamStatus");
    const youtubeFrame = $("#youtubeLive");

    // fake chat pool
    const chatPool = [
        "🔥 That's a banger!",
        "Where's the VIP link?",
        "Sound is amazing",
        "Shoutout from Nakuru!",
        "Who is that guitarist?",
        "Love the lighting",
        "Best production I've seen",
        "Please show the drummer",
        "Wedding vibes",
        "This transition was awesome",
    ];
    const names = [
        "@FaithM",
        "@Kev254",
        "@Linda",
        "@DJTone",
        "@Milly",
        "@SamK",
        "@Njeri",
        "@Amina",
        "@Tony",
        "@Zoe",
        "@Peter",
        "@Lina",
    ];

    // number anim
    function animateNumber(el, to, dur = 600) {
        const from = Number(el.textContent.replace(/,/g, "")) || 0;
        const start = performance.now();

        function step(now) {
            const t = Math.min(1, (now - start) / dur);
            const v = Math.floor(from + (to - from) * t);
            el.textContent = fmt(v);
            if (t < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
    }

    function refreshUI() {
        animateNumber(ovViewCount, state.viewers, 900);
        animateNumber(ovLikeCount, state.likes, 700);
        animateNumber(viewerCount, state.viewers, 900);
        animateNumber(miniView, state.viewers, 900);
        animateNumber(metricViews, state.viewers, 900);
        animateNumber(metricLikes, state.likes, 700);
        animateNumber(metricChats, state.chats, 700);
        chatCount.textContent = `${state.chats} messages`;
    }

    // seed
    ovViewCount.textContent = fmt(state.viewers);
    ovLikeCount.textContent = fmt(state.likes);
    viewerCount.textContent = fmt(state.viewers);
    miniView.textContent = fmt(state.viewers);
    metricViews.textContent = fmt(state.viewers);
    metricLikes.textContent = fmt(state.likes);
    metricChats.textContent = fmt(state.chats);
    chatCount.textContent = `${state.chats} messages`;

    // add chat message
    function addChat(user, text) {
        const node = document.createElement("div");
        node.className = "chat-message";
        node.innerHTML = `<div class="chat-avatar" aria-hidden="true">${user
            .replace("@", "")
            .slice(0, 2)
            .toUpperCase()}</div><div><div class="chat-username">${user}</div><div class="chat-text">${escapeHtml(
            text
        )}</div><div class="chat-meta">${new Date().toLocaleTimeString()}</div></div>`;
        chatPreview.appendChild(node);
        // limit
        while (chatPreview.childElementCount > 120)
            chatPreview.removeChild(chatPreview.firstChild);
        chatPreview.scrollTop = chatPreview.scrollHeight;
    }

    function escapeHtml(s) {
        return String(s).replace(/[&<>"']/g, function (m) {
            return {
                "&": "&amp;",
                "<": "&lt;",
                ">": "&gt;",
                '"': "&quot;",
                "'": "&#39;",
            }[m];
        });
    }

    // seed few messages
    for (let i = 0; i < 6; i++) {
        const name = names[Math.floor(Math.random() * names.length)];
        const txt = chatPool[Math.floor(Math.random() * chatPool.length)];
        addChat(name, txt);
    }

    // simulate live changes
    setInterval(() => {
        if (!state.auto) return;
        const vdelta = Math.floor((Math.random() - 0.2) * 160);
        state.viewers = Math.max(0, state.viewers + vdelta);
        if (Math.random() < 0.6) state.likes += Math.floor(Math.random() * 6);
        if (Math.random() < 0.4) {
            const name = names[Math.floor(Math.random() * names.length)];
            const txt = chatPool[Math.floor(Math.random() * chatPool.length)];
            addChat(name, txt);
            state.chats++;
        }
        // occasional status jitter
        if (Math.random() < 0.06) {
            streamStatus.textContent = "Intermittent • Stabilizing";
            setTimeout(
                () => (streamStatus.textContent = "Live • Stable"),
                2500
            );
        }
        refreshUI();
    }, 2200);

    // send chat
    btnSendChat.addEventListener("click", () => {
        const txt = chatInput.value.trim();
        if (!txt) return;
        addChat("@You", txt);
        chatInput.value = "";
        state.chats++;
        refreshUI();
    });
    chatInput.addEventListener("keydown", (e) => {
        if (e.key === "Enter") {
            e.preventDefault();
            btnSendChat.click();
        }
    });

    // reaction clicks
    likeBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            const emoji = btn.dataset.emoji || "✨";
            // flying emoji
            const el = document.createElement("div");
            el.textContent = emoji;
            el.style.position = "fixed";
            const r = btn.getBoundingClientRect();
            el.style.left = r.left + r.width / 2 + "px";
            el.style.top = r.top + r.height / 2 + "px";
            el.style.fontSize = "18px";
            el.style.zIndex = 9999;
            el.style.transition =
                "transform 900ms cubic-bezier(.2,.9,.2,1), opacity 900ms ease";
            document.body.appendChild(el);
            requestAnimationFrame(() => {
                el.style.transform = "translateY(-180px) scale(1.6)";
                el.style.opacity = "0";
            });
            setTimeout(() => document.body.removeChild(el), 1000);
            // bump stats
            state.likes += Math.floor(1 + Math.random() * 3);
            state.viewers += Math.floor(Math.random() * 3);
            refreshUI();
        });
    });

    // join stream toggle
    btnJoinStream.addEventListener("click", () => {
        const pressed = btnJoinStream.getAttribute("aria-pressed") === "true";
        btnJoinStream.setAttribute("aria-pressed", (!pressed).toString());
        if (!pressed) {
            btnJoinStream.textContent = "Joined";
            state.viewers++;
            addChat("@System", "You joined the stream — welcome!");
        } else {
            btnJoinStream.textContent = "Join";
            state.viewers = Math.max(0, state.viewers - 1);
        }
        refreshUI();
    });

    // angle thumbnail switching (replace main iframe with direct video only for demo)
    const angleThumbs = $$(".angle-thumb");

    function setActiveAngle(idx) {
        angleThumbs.forEach((t, i) => {
            t.classList.toggle("active", i === idx);
            t.setAttribute("aria-pressed", i === idx ? "true" : "false");
        });
        const target = angleThumbs[idx];
        if (!target) return;
        const src = target.dataset.src;
        // If using iframe (YouTube Live), better to offer a picture-in-picture or overlay — here we will show a brief overlay and then do nothing disruptive
        // For demo: show a small overlay "Switched to Stage A" — not swapping YouTube live.
        const note = document.createElement("div");
        note.textContent = `Switched to ${target.dataset.label}`;
        note.style.position = "absolute";
        note.style.bottom = "18px";
        note.style.right = "18px";
        note.style.padding = "8px 12px";
        note.style.borderRadius = "10px";
        note.style.background = "rgba(0,0,0,0.6)";
        note.style.zIndex = 9999;
        note.style.border = "1px solid rgba(255,255,255,0.03)";
        document.getElementById("mainPlayer").appendChild(note);
        setTimeout(() => {
            note.style.opacity = "0";
            setTimeout(() => {
                if (note && note.parentNode) note.parentNode.removeChild(note);
            }, 420);
        }, 900);
    }
    angleThumbs.forEach((t, i) => {
        t.addEventListener("click", () => setActiveAngle(i));
        t.addEventListener("keydown", (e) => {
            if (e.key === "Enter" || e.key === " ") {
                e.preventDefault();
                setActiveAngle(i);
            }
        });
    });

    // Swiper interaction: ensure clicking slide sets active style
    document.querySelectorAll(".swiper-slide").forEach((slide, idx) => {
        slide.addEventListener("click", () => {
            setActiveAngle(idx);
        });
    });

    // small periodic quality toggle
    setInterval(() => {
        const q =
            Math.random() > 0.7
                ? "720p"
                : Math.random() > 0.5
                ? "1080p"
                : "Auto";
        qualityBadge.textContent = q;
        latencyBadge.textContent =
            Math.random() > 0.8 ? "Low Latency" : "Stable";
    }, 4200);

    // reduced motion handling
    if (
        window.matchMedia &&
        window.matchMedia("(prefers-reduced-motion: reduce)").matches
    ) {
        state.auto = false;
    }

    // expose state for debugging
    window._liveState = state;

    // initial refresh
    refreshUI();
})();
