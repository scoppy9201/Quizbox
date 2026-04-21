<x-layout>
    <x-slot:title>
        QuizBox | Smart Quiz & Learning System
    </x-slot>
    <section class="qb-hero">
        <div class="qb-hero__blob qb-hero__blob--1"></div>
        <div class="qb-hero__blob qb-hero__blob--2"></div>

        <div class="qb-hero__inner">
            {{-- Left --}}
            <div class="qb-hero__left">
                <div class="qb-badge">
                    <x-heroicon-s-sparkles class="w-4 h-4" />
                    Nền tảng ôn thi thông minh #1 Việt Nam
                </div>

                <h1 class="qb-hero__title">
                    Chinh phục mọi kỳ thi <span class="qb-hero__title-accent">nhanh hơn, thông minh hơn</span>
                </h1>

                <p class="qb-hero__desc">
                    Luyện đề trắc nghiệm theo từng chủ đề, theo dõi tiến độ theo thời gian thực và tự tin bước vào phòng thi.
                </p>

                <div class="qb-hero__actions">
                    <a href="#" class="qb-btn qb-btn--primary">
                        <x-heroicon-o-pencil-square class="w-5 h-5" />
                        Bắt đầu ôn thi
                    </a>
                    <a href="#" class="qb-btn qb-btn--outline">
                        <x-heroicon-o-play-circle class="w-5 h-5" />
                        Xem demo
                    </a>
                </div>

                <div class="qb-hero__stats">
                    <div class="qb-stat">
                        <span class="qb-stat__number">50,000+</span>
                        <span class="qb-stat__label">Học viên</span>
                    </div>
                    <div class="qb-stat__divider"></div>
                    <div class="qb-stat">
                        <span class="qb-stat__number">10,000+</span>
                        <span class="qb-stat__label">Câu hỏi</span>
                    </div>
                    <div class="qb-stat__divider"></div>
                    <div class="qb-stat">
                        <span class="qb-stat__number">500+</span>
                        <span class="qb-stat__label">Đề thi</span>
                    </div>
                </div>
            </div>

            {{-- Right: Floating cards animation --}}
            <div class="qb-hero__right">
                <div class="qb-floating-scene">

                    <svg class="qb-connectors" viewBox="0 0 420 380" fill="none">
                        <line x1="100" y1="60"  x2="210" y2="190" stroke="rgba(59,130,246,0.15)" stroke-width="1" stroke-dasharray="4 4"/>
                        <line x1="320" y1="50"  x2="210" y2="190" stroke="rgba(59,130,246,0.15)" stroke-width="1" stroke-dasharray="4 4"/>
                        <line x1="80"  y1="310" x2="210" y2="190" stroke="rgba(59,130,246,0.15)" stroke-width="1" stroke-dasharray="4 4"/>
                        <line x1="330" y1="320" x2="210" y2="190" stroke="rgba(59,130,246,0.15)" stroke-width="1" stroke-dasharray="4 4"/>
                    </svg>

                    <div class="qb-center-icon">
                        <x-heroicon-s-sparkles class="w-14 h-14 text-white" />
                    </div>

                    {{-- Card 1: top-left --}}
                    <div class="qb-fcard qb-fcard--tl">
                        <div class="qb-fcard__label">Đề thi Toán 12 — HK2</div>
                        <div class="qb-fcard__row">
                            <span class="qb-fcard__value">Câu 13/20</span>
                            <span class="qb-fcard__status">Đang làm</span>
                        </div>
                        <div class="qb-fcard__bar"><div class="qb-fcard__bar-fill" style="width:65%"></div></div>
                        <div class="qb-fcard__sub">Còn 18 phút</div>
                    </div>

                    {{-- Card 2: top-right --}}
                    <div class="qb-fcard qb-fcard--tr">
                        <div class="qb-fcard__label">Tổng học viên</div>
                        <div class="qb-fcard__value">50,000+</div>
                        <div class="qb-fcard__green">↑ 12% tháng này</div>
                    </div>

                    {{-- Card 3: bottom-left --}}
                    <div class="qb-fcard qb-fcard--bl">
                        <div class="qb-fcard__label">Câu hỏi</div>
                        <div class="qb-fcard__value">10,000+</div>
                        <div class="qb-fcard__green">↑ 300 câu mới</div>
                    </div>

                    {{-- Card 4: bottom-right --}}
                    <div class="qb-fcard qb-fcard--br">
                        <div class="qb-fcard__label">Đề thi hoàn thành</div>
                        <div class="qb-fcard__value">500+</div>
                        <div class="qb-fcard__sub">Toàn bộ môn học</div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="qb-subjects qb-reveal">
        <div class="qb-container">
            <p class="qb-subjects__eyebrow">Linh hoạt đáp ứng</p>
            <h2 class="qb-subjects__heading">
                <span class="qb-badge-count">10+</span>
                môn học trên một nền tảng duy nhất
            </h2>
            
            <div x-data="{ active: 'toan' }">

            {{-- Tabs --}}
            <div class="qb-tabs">
                <button @click="active='toan'" :class="active==='toan' ? 'qb-tab qb-tab--active' : 'qb-tab'">
                    <x-heroicon-o-calculator class="w-4 h-4" /> Toán học
                </button>
                <button @click="active='ly'" :class="active==='ly' ? 'qb-tab qb-tab--active' : 'qb-tab'">
                    <x-heroicon-o-beaker class="w-4 h-4" /> Vật lý
                </button>
                <button @click="active='hoa'" :class="active==='hoa' ? 'qb-tab qb-tab--active' : 'qb-tab'">
                    <x-heroicon-o-fire class="w-4 h-4" /> Hóa học
                </button>
                <button @click="active='anh'" :class="active==='anh' ? 'qb-tab qb-tab--active' : 'qb-tab'">
                    <x-heroicon-o-language class="w-4 h-4" /> Tiếng Anh
                </button>
                <button @click="active='van'" :class="active==='van' ? 'qb-tab qb-tab--active' : 'qb-tab'">
                    <x-heroicon-o-book-open class="w-4 h-4" /> Ngữ văn
                </button>
                <button @click="active='su'" :class="active==='su' ? 'qb-tab qb-tab--active' : 'qb-tab'">
                    <x-heroicon-o-globe-alt class="w-4 h-4" /> Lịch sử
                </button>
                <button @click="active='dia'" :class="active==='dia' ? 'qb-tab qb-tab--active' : 'qb-tab'">
                    <x-heroicon-o-map class="w-4 h-4" /> Địa lý
                </button>
                <button @click="active='khac'" :class="active==='khac' ? 'qb-tab qb-tab--active' : 'qb-tab'">
                    <x-heroicon-o-ellipsis-horizontal class="w-4 h-4" /> Khác
                </button>
            </div>

            {{-- Tab content --}}
            <div class="qb-tab-content">

                {{-- Toán --}}
                <div x-show="active==='toan'" x-transition class="qb-tab-panel">
                    <div class="qb-tab-panel__left">
                        <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=600&q=80" alt="Toán học" class="qb-tab-panel__img" />
                    </div>
                    <div class="qb-tab-panel__right">
                        <h3 class="qb-tab-panel__title">Môn Toán học</h3>
                        <ul class="qb-feature-list">
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Hệ thống đề thi phân loại từ cơ bản đến nâng cao, bám sát cấu trúc thi THPTQG.</li>
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Giải chi tiết từng câu hỏi giúp học sinh hiểu rõ phương pháp giải.</li>
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Thống kê điểm yếu theo chương, đề xuất ôn tập thông minh.</li>
                        </ul>
                        <div class="qb-tab-panel__logos">
                            <span class="qb-logo-tag">Giải tích</span>
                            <span class="qb-logo-tag">Hình học</span>
                            <span class="qb-logo-tag">Đại số</span>
                        </div>
                        <a href="#" class="qb-btn qb-btn--primary mt-6 inline-flex">Tìm hiểu thêm</a>
                    </div>
                </div>

                {{-- Vật lý --}}
                <div x-show="active==='ly'" x-transition class="qb-tab-panel">
                    <div class="qb-tab-panel__left">
                        <img src="https://images.unsplash.com/photo-1636466497217-26a8cbeaf0aa?w=600&q=80" alt="Vật lý" class="qb-tab-panel__img" />
                    </div>
                    <div class="qb-tab-panel__right">
                        <h3 class="qb-tab-panel__title">Môn Vật lý</h3>
                        <ul class="qb-feature-list">
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Đề thi đa dạng: điện từ, cơ học, sóng ánh sáng, hạt nhân nguyên tử.</li>
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Hình ảnh minh họa trực quan, giúp ghi nhớ công thức dễ hơn.</li>
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Luyện đề theo dạng bài, nắm chắc kỹ năng từng phần.</li>
                        </ul>
                        <div class="qb-tab-panel__logos">
                            <span class="qb-logo-tag">Cơ học</span>
                            <span class="qb-logo-tag">Điện từ</span>
                            <span class="qb-logo-tag">Hạt nhân</span>
                        </div>
                        <a href="#" class="qb-btn qb-btn--primary mt-6 inline-flex">Tìm hiểu thêm</a>
                    </div>
                </div>

                {{-- Hóa học --}}
                <div x-show="active==='hoa'" x-transition class="qb-tab-panel">
                    <div class="qb-tab-panel__left">
                        <img src="https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?w=600&q=80" alt="Hóa học" class="qb-tab-panel__img" />
                    </div>
                    <div class="qb-tab-panel__right">
                        <h3 class="qb-tab-panel__title">Môn Hóa học</h3>
                        <ul class="qb-feature-list">
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Bài tập hóa vô cơ, hữu cơ đầy đủ, bám sát đề thi THPTQG.</li>
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Phương trình phản ứng được giải thích chi tiết, dễ ghi nhớ.</li>
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Luyện tập theo dạng bài: nhận biết, tính toán, thực nghiệm.</li>
                        </ul>
                        <div class="qb-tab-panel__logos">
                            <span class="qb-logo-tag">Vô cơ</span>
                            <span class="qb-logo-tag">Hữu cơ</span>
                            <span class="qb-logo-tag">Đại cương</span>
                        </div>
                        <a href="#" class="qb-btn qb-btn--primary mt-6 inline-flex">Tìm hiểu thêm</a>
                    </div>
                </div>

                {{-- Tiếng Anh --}}
                <div x-show="active==='anh'" x-transition class="qb-tab-panel">
                    <div class="qb-tab-panel__left">
                        <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?w=600&q=80" alt="Tiếng Anh" class="qb-tab-panel__img" />
                    </div>
                    <div class="qb-tab-panel__right">
                        <h3 class="qb-tab-panel__title">Môn Tiếng Anh</h3>
                        <ul class="qb-feature-list">
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Luyện đề trắc nghiệm toàn diện: ngữ pháp, từ vựng, đọc hiểu, phát âm.</li>
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Giải thích đáp án kèm ghi chú ngữ pháp chi tiết.</li>
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Hệ thống từ vựng theo chủ đề giúp mở rộng vốn từ hiệu quả.</li>
                        </ul>
                        <div class="qb-tab-panel__logos">
                            <span class="qb-logo-tag">Ngữ pháp</span>
                            <span class="qb-logo-tag">Từ vựng</span>
                            <span class="qb-logo-tag">Đọc hiểu</span>
                        </div>
                        <a href="#" class="qb-btn qb-btn--primary mt-6 inline-flex">Tìm hiểu thêm</a>
                    </div>
                </div>

                {{-- Ngữ văn --}}
                <div x-show="active==='van'" x-transition class="qb-tab-panel">
                    <div class="qb-tab-panel__left">
                        <img src="https://images.unsplash.com/photo-1457369804613-52c61a468e7d?w=600&q=80" alt="Ngữ văn" class="qb-tab-panel__img" />
                    </div>
                    <div class="qb-tab-panel__right">
                        <h3 class="qb-tab-panel__title">Môn Ngữ văn</h3>
                        <ul class="qb-feature-list">
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Đề đọc hiểu, nghị luận xã hội và nghị luận văn học đầy đủ theo cấu trúc mới.</li>
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Dàn ý mẫu và bài văn tham khảo cho từng dạng đề.</li>
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Hệ thống kiến thức tác phẩm trọng tâm, dễ ôn tập.</li>
                        </ul>
                        <div class="qb-tab-panel__logos">
                            <span class="qb-logo-tag">Đọc hiểu</span>
                            <span class="qb-logo-tag">Nghị luận</span>
                            <span class="qb-logo-tag">Tác phẩm</span>
                        </div>
                        <a href="#" class="qb-btn qb-btn--primary mt-6 inline-flex">Tìm hiểu thêm</a>
                    </div>
                </div>

                {{-- Lịch sử --}}
                <div x-show="active==='su'" x-transition class="qb-tab-panel">
                    <div class="qb-tab-panel__left">
                        <img src="https://images.unsplash.com/photo-1461360370896-922624d12aa1?w=600&q=80" alt="Lịch sử" class="qb-tab-panel__img" />
                    </div>
                    <div class="qb-tab-panel__right">
                        <h3 class="qb-tab-panel__title">Môn Lịch sử</h3>
                        <ul class="qb-feature-list">
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Câu hỏi trắc nghiệm bám sát sự kiện lịch sử Việt Nam và thế giới.</li>
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Timeline sự kiện trực quan giúp ghi nhớ mốc thời gian dễ dàng.</li>
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Phân tích nguyên nhân, diễn biến, kết quả từng sự kiện quan trọng.</li>
                        </ul>
                        <div class="qb-tab-panel__logos">
                            <span class="qb-logo-tag">VN hiện đại</span>
                            <span class="qb-logo-tag">Thế giới</span>
                            <span class="qb-logo-tag">Cổ đại</span>
                        </div>
                        <a href="#" class="qb-btn qb-btn--primary mt-6 inline-flex">Tìm hiểu thêm</a>
                    </div>
                </div>

                {{-- Địa lý --}}
                <div x-show="active==='dia'" x-transition class="qb-tab-panel">
                    <div class="qb-tab-panel__left">
                        <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?w=600&q=80" alt="Địa lý" class="qb-tab-panel__img" />
                    </div>
                    <div class="qb-tab-panel__right">
                        <h3 class="qb-tab-panel__title">Môn Địa lý</h3>
                        <ul class="qb-feature-list">
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Đề thi bao quát địa lý tự nhiên, dân cư, kinh tế Việt Nam và thế giới.</li>
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Bản đồ tư duy và sơ đồ hóa kiến thức giúp học nhanh hơn.</li>
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Luyện kỹ năng đọc biểu đồ, nhận xét số liệu thống kê.</li>
                        </ul>
                        <div class="qb-tab-panel__logos">
                            <span class="qb-logo-tag">Tự nhiên</span>
                            <span class="qb-logo-tag">Kinh tế</span>
                            <span class="qb-logo-tag">Dân cư</span>
                        </div>
                        <a href="#" class="qb-btn qb-btn--primary mt-6 inline-flex">Tìm hiểu thêm</a>
                    </div>
                </div>

                {{-- Khác --}}
                <div x-show="active==='khac'" x-transition class="qb-tab-panel">
                    <div class="qb-tab-panel__left">
                        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600&q=80" alt="Các môn khác" class="qb-tab-panel__img" />
                    </div>
                    <div class="qb-tab-panel__right">
                        <h3 class="qb-tab-panel__title">Các môn khác</h3>
                        <ul class="qb-feature-list">
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Sinh học, GDCD, Tin học với kho đề thi phong phú, cập nhật liên tục.</li>
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Nội dung bám sát chương trình THPT mới nhất của Bộ GD&ĐT.</li>
                            <li><x-heroicon-s-check-badge class="w-5 h-5 text-blue-400 shrink-0" /> Hệ thống mở rộng thêm môn học mới theo nhu cầu người dùng.</li>
                        </ul>
                        <div class="qb-tab-panel__logos">
                            <span class="qb-logo-tag">Sinh học</span>
                            <span class="qb-logo-tag">GDCD</span>
                            <span class="qb-logo-tag">Tin học</span>
                        </div>
                        <a href="#" class="qb-btn qb-btn--primary mt-6 inline-flex">Tìm hiểu thêm</a>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>

    <section class="qb-roadmap qb-reveal">
        <div class="qb-container">
            <div class="qb-roadmap__header">
                <h2 class="qb-roadmap__title">
                    Đồng hành cùng học sinh
                    <span class="qb-roadmap__title-accent">xuyên suốt lộ trình chinh phục kỳ thi</span>
                </h2>
                <a href="#" class="qb-btn qb-btn--primary">
                    <x-heroicon-o-rocket-launch class="w-5 h-5" />
                    Bắt đầu ngay hôm nay
                </a>
            </div>

            {{-- Stepper --}}
            <div class="qb-stepper" 
                x-data="{ step: 1, progress: 0 }" 
                x-init="setInterval(() => { 
                    progress += 2; 
                    if(progress >= 100) { 
                        progress = 0; 
                        step = step >= 4 ? 1 : step + 1; 
                    } 
                }, 60)">
                <div class="qb-stepper__nav">
                    <button @click="step=1; progress=0" :class="step===1 ? 'qb-step qb-step--active' : 'qb-step'">
                        <span class="qb-step__num">1</span> Chẩn đoán
                    </button>

                    <div class="qb-step__line" :class="step > 1 ? 'qb-step__line--done' : ''">
                        <div class="qb-step__line-fill" x-show="step === 1" :style="`width: ${progress}%`"></div>
                    </div>

                    <button @click="step=2; progress=0" :class="step===2 ? 'qb-step qb-step--active' : 'qb-step'">
                        <span class="qb-step__num">2</span> Luyện tập
                    </button>

                    <div class="qb-step__line" :class="step > 2 ? 'qb-step__line--done' : ''">
                        <div class="qb-step__line-fill" x-show="step === 2" :style="`width: ${progress}%`"></div>
                    </div>

                    <button @click="step=3; progress=0" :class="step===3 ? 'qb-step qb-step--active' : 'qb-step'">
                        <span class="qb-step__num">3</span> Tối ưu hóa
                    </button>

                    <div class="qb-step__line" :class="step > 3 ? 'qb-step__line--done' : ''">
                        <div class="qb-step__line-fill" x-show="step === 3" :style="`width: ${progress}%`"></div>
                    </div>

                    <button @click="step=4; progress=0" :class="step===4 ? 'qb-step qb-step--active' : 'qb-step'">
                        <span class="qb-step__num">4</span> Chinh phục
                    </button>
                </div>

                {{-- Step panels --}}
                <div class="qb-stepper__panel">

                    <div x-show="step===1" class="qb-step-panel">
                        <div class="qb-step-panel__left">
                            <div class="qb-step-panel__icon">
                                <x-heroicon-o-clipboard-document-list class="w-8 h-8 text-blue-400" />
                            </div>
                            <h3 class="qb-step-panel__title">Chẩn đoán năng lực</h3>
                            <p class="qb-step-panel__desc">
                                Làm bài kiểm tra đầu vào để hệ thống đánh giá chính xác điểm mạnh, điểm yếu của bạn theo từng chương, từng dạng bài.
                            </p>
                        </div>
                        <div class="qb-step-panel__right">
                            <div class="qb-flow">
                                <div class="qb-flow__node qb-flow__node--active">
                                    <span class="qb-flow__num">1</span>
                                    <span>Làm bài kiểm tra đầu vào</span>
                                </div>
                                <div class="qb-flow__arrow">→</div>
                                <div class="qb-flow__node">
                                    <span class="qb-flow__num">2</span>
                                    <span>Phân tích kết quả theo chương</span>
                                </div>
                                <div class="qb-flow__arrow">→</div>
                                <div class="qb-flow__node">
                                    <span class="qb-flow__num">3</span>
                                    <span>Đề xuất lộ trình cá nhân hóa</span>
                                </div>
                                <div class="qb-flow__arrow">→</div>
                                <div class="qb-flow__node">
                                    <span class="qb-flow__num">4</span>
                                    <x-heroicon-o-check class="w-4 h-4 text-green-400" />
                                    <span>Tổng kết & bắt đầu học</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="step===2" class="qb-step-panel">
                        <div class="qb-step-panel__left">
                            <div class="qb-step-panel__icon">
                                <x-heroicon-o-pencil class="w-8 h-8 text-blue-400" />
                            </div>
                            <h3 class="qb-step-panel__title">Luyện tập có hệ thống</h3>
                            <p class="qb-step-panel__desc">
                                Luyện đề theo từng dạng bài, từng chương với kho câu hỏi phong phú. Xem giải thích chi tiết sau mỗi câu trả lời sai.
                            </p>
                        </div>
                        <div class="qb-step-panel__right">
                            <div class="qb-flow">
                                <div class="qb-flow__node qb-flow__node--active">
                                    <span class="qb-flow__num">1</span>
                                    <span>Chọn môn & chương cần luyện</span>
                                </div>
                                <div class="qb-flow__arrow">→</div>
                                <div class="qb-flow__node">
                                    <span class="qb-flow__num">2</span>
                                    <span>Làm bài theo thời gian thực</span>
                                </div>
                                <div class="qb-flow__arrow">→</div>
                                <div class="qb-flow__node">
                                    <span class="qb-flow__num">3</span>
                                    <span>Xem giải chi tiết từng câu</span>
                                </div>
                                <div class="qb-flow__arrow">→</div>
                                <div class="qb-flow__node">
                                    <span class="qb-flow__num">4</span>
                                    <x-heroicon-o-check class="w-4 h-4 text-green-400" />
                                    <span>Ghi nhớ & ôn lại câu sai</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="step===3" class="qb-step-panel">
                        <div class="qb-step-panel__left">
                            <div class="qb-step-panel__icon">
                                <x-heroicon-o-chart-bar class="w-8 h-8 text-blue-400" />
                            </div>
                            <h3 class="qb-step-panel__title">Tối ưu hóa điểm số</h3>
                            <p class="qb-step-panel__desc">
                                Theo dõi biểu đồ tiến độ theo thời gian. Hệ thống tự động gợi ý phần cần ôn thêm dựa trên lịch sử làm bài.
                            </p>
                        </div>
                        <div class="qb-step-panel__right">
                            <div class="qb-flow">
                                <div class="qb-flow__node qb-flow__node--active">
                                    <span class="qb-flow__num">1</span>
                                    <span>Xem báo cáo tiến độ tổng quan</span>
                                </div>
                                <div class="qb-flow__arrow">→</div>
                                <div class="qb-flow__node">
                                    <span class="qb-flow__num">2</span>
                                    <span>Phân tích điểm yếu cần cải thiện</span>
                                </div>
                                <div class="qb-flow__arrow">→</div>
                                <div class="qb-flow__node">
                                    <span class="qb-flow__num">3</span>
                                    <span>Luyện tập bổ sung theo gợi ý AI</span>
                                </div>
                                <div class="qb-flow__arrow">→</div>
                                <div class="qb-flow__node">
                                    <span class="qb-flow__num">4</span>
                                    <x-heroicon-o-check class="w-4 h-4 text-green-400" />
                                    <span>Đánh giá lại & điều chỉnh kế hoạch</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="step===4" class="qb-step-panel">
                        <div class="qb-step-panel__left">
                            <div class="qb-step-panel__icon">
                                <x-heroicon-o-trophy class="w-8 h-8 text-yellow-400" />
                            </div>
                            <h3 class="qb-step-panel__title">Chinh phục kỳ thi</h3>
                            <p class="qb-step-panel__desc">
                                Thi thử đề chuẩn cấu trúc THPTQG trong điều kiện giống thật. Đánh giá sẵn sàng và tự tin bước vào phòng thi.
                            </p>
                        </div>
                        <div class="qb-step-panel__right">
                            <div class="qb-flow">
                                <div class="qb-flow__node qb-flow__node--active">
                                    <span class="qb-flow__num">1</span>
                                    <span>Thi thử đề sát cấu trúc thật</span>
                                </div>
                                <div class="qb-flow__arrow">→</div>
                                <div class="qb-flow__node">
                                    <span class="qb-flow__num">2</span>
                                    <span>Xem phân tích điểm số chi tiết</span>
                                </div>
                                <div class="qb-flow__arrow">→</div>
                                <div class="qb-flow__node">
                                    <span class="qb-flow__num">3</span>
                                    <span>So sánh với học sinh cùng lớp</span>
                                </div>
                                <div class="qb-flow__arrow">→</div>
                                <div class="qb-flow__node">
                                    <span class="qb-flow__num">4</span>
                                    <x-heroicon-o-check class="w-4 h-4 text-green-400" />
                                    <span>Tự tin bước vào kỳ thi thật</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="qb-cta qb-reveal">
        <div class="qb-cta__glow"></div>
        <div class="qb-container qb-cta__inner">
            <h2 class="qb-cta__title">
                Sẵn sàng chinh phục kỳ thi?
                <span class="qb-cta__title-accent">Bắt đầu miễn phí ngay hôm nay.</span>
            </h2>
            <p class="qb-cta__desc">Không cần thẻ tín dụng. Đăng ký trong 30 giây.</p>
            <div class="qb-hero__actions">
                <a href="#" class="qb-btn qb-btn--primary">
                    <x-heroicon-o-user-plus class="w-5 h-5" />
                    Đăng ký miễn phí
                </a>
                <a href="#" class="qb-btn qb-btn--outline">
                    <x-heroicon-o-phone class="w-5 h-5" />
                    Liên hệ tư vấn
                </a>
            </div>
        </div>
    </section>
</x-layout>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            } else {
                entry.target.classList.remove('is-visible');
            }
        });
    }, { threshold: 0.15 });

    document.querySelectorAll('.qb-reveal').forEach(el => observer.observe(el));
</script>