<!-- Log In Modal -->
<div class="modal fade" id="applyNow" tabindex="-1" role="dialog" aria-labelledby="applyNow-Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="applyNow-Modal">
            {{-- <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span> --}}
            <div class="modal-body">
                {{-- <h4 class="modal-header-title mt-0">{{ __('Apply Program') }}</h4> --}}
                <div class="login-form">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-ucap mb-0">{{ __('IELTS') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>{{ __('Total Score') }}</label>
                                <input type="number" step="0.1" min="{{ 'ielts_min_score' }}" max="{{ 'ielts_base_score' }}" class="form-control" placeholder="{{ __('Ex: 7.50') }}" name="ielts" required>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Individual Score') }}</label>
                                <div class="input-group border-0">
                                    <input type="number" step="0.1" min="{{ 'listening_min_score' }}" max="{{ 'listening_base_score' }}" class="form-control" placeholder="{{ __('Listening') }}" name="listening" required>

                                    <input type="number" step="0.1" min="{{ 'reading_min_score' }}" max="{{ 'reading_base_score' }}" class="form-control" placeholder="{{ __('reading') }}" name="Reading" required>

                                    <input type="number" step="0.1" min="{{ 'speaking_min_score' }}" max="{{ 'speaking_base_score' }}" class="form-control" placeholder="{{ __('Speaking') }}" name="speaking" required>

                                    <input type="number" step="0.1" min="{{ 'writing_min_score' }}" max="{{ 'writing_base_score' }}" class="form-control" placeholder="{{ __('Writing') }}" name="writing" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="social-login mb-3">
                    <input id="accept" class="checkbox-custom" name="accept" type="checkbox" required>
                    <label for="accept" class="checkbox-custom-label">{{ __('I accept that I have all the required documents & I can fulfill the needed requirements.') }}</label>
                </div>
                
                {{-- <div class="modal-divider"><span>{{ __('') }}</span></div> --}}
                <div class="social-login ntr mb-3">
                    <ul>
                        <li>
                            <a href="#" class="btn connect-fb bg-ucap">
                                <i class="ti-shopping-cart-full"></i> 
                                {{ __('Add To Apply') }}
                            </a>
                        </li>

                        <li>
                            <a href="#" class="btn connect-google bg-dark">
                                <i class="ti-check"></i>
                                {{ __('Apply Now') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->