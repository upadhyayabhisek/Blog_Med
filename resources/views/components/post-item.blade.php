
<div style="
                display: flex;
                max-width: calc(100vw - 450px);
                margin: 0 auto 50px auto;
                background: white;
                border: 1px solid #e5e7eb;
                border-radius: 0.5rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                min-height: 300px;
            ">
    <!-- Fixed-size image -->
    <a href="#" style="flex-shrink: 0;">
        <img
            src="https://flowbite.com/docs/images/blog/image-1.jpg"
            alt="Blog Image"
            style="
                            width: 250px;
                            height: 100%;
                            object-fit: cover;
                            display: block;
                        "
        />
    </a>

    <!-- Content area -->
    <div style="
                    flex-grow: 1;
                    padding: 1.25rem;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                ">
        <div>
            <a href="#" style="text-decoration: none;">
                <h5 style="
                                margin-bottom: 0.75rem;
                                font-size: 1.5rem;
                                font-weight: 700;
                                color: #111827;
                            ">

                    {{ $post->title }}
                </h5>
            </a>
            <div style="margin-bottom: 1rem; color: #4b5563; font-size: 1rem;">
                {{ Str::words($post->description,20) }}
            </div>
        </div>

        <!-- Read More Button -->
        <a href="#"
           style="
                           display: inline-flex;
                           align-items: center;
                           padding: 0.5rem 0.75rem;
                           font-size: 0.875rem;
                           font-weight: 500;
                           color: white;
                           background-color: #2563eb;
                           border-radius: 0.5rem;
                           text-decoration: none;
                           cursor: pointer;
                           width: fit-content;
                       "
           onmouseover="this.style.backgroundColor='#1e40af'"
           onmouseout="this.style.backgroundColor='#2563eb'">
            Read more
            <svg style="width: 1rem; height: 1rem; margin-left: 0.5rem;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>
