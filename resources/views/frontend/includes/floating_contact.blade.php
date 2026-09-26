<!-- Floating WhatsApp & Hotline Contact Widget (Inspired by nlquran.net) -->
@php
    $linksContact = \App\Models\WebsiteLinks::latest()->first();
    $rawPhone = $linksContact->number ?? '01816649124';
    $cleanPhone = preg_replace('/[^0-9]/', '', $rawPhone);
    if (strpos($cleanPhone, '88') !== 0 && strlen($cleanPhone) == 11) {
        $cleanPhone = '88' . $cleanPhone;
    }
@endphp

<div id="floating-quick-actions" class="floating-quick-actions">
    
    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode('আসসালামু আলাইকুম, মুকাদ্দামাতুল কুরআন একাডেমির কোর্স ও ভর্তি সম্পর্কে জানতে চাই।') }}" target="_blank" rel="noopener" class="floating-btn floating-btn-wa" title="হোয়াটসঅ্যাপে চ্যাট করুন">
        <i class="fa fa-whatsapp"></i>
    </a>

    <!-- Hotline Phone Floating Button -->
    <a href="tel:{{ $rawPhone }}" class="floating-btn floating-btn-phone" title="হটলাইনে সরাসরি কল করুন: {{ $rawPhone }}">
        <i class="fa fa-phone"></i>
    </a>

</div>

<style>
.floating-quick-actions {
    position: fixed;
    bottom: 25px;
    left: 25px;
    right: auto;
    z-index: 9999;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.floating-btn {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    color: #ffffff !important;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
}

.floating-btn-wa {
    background: #25D366;
    font-size: 24px;
    box-shadow: 0 4px 15px rgba(37,211,102,0.4);
}

.floating-btn-phone {
    background: #1b4332;
    font-size: 20px;
    box-shadow: 0 4px 15px rgba(27,67,50,0.4);
}

.floating-btn:hover {
    transform: scale(1.1);
    color: #ffffff;
}

@media (max-width: 767px) {
    .floating-quick-actions {
        left: auto !important;
        right: 18px !important;
        bottom: 20px !important;
        gap: 10px !important;
    }
    .floating-btn {
        width: 44px !important;
        height: 44px !important;
    }
    .floating-btn-wa {
        font-size: 22px !important;
    }
    .floating-btn-phone {
        font-size: 18px !important;
    }
}
</style>
