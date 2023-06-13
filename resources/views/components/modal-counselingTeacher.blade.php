{{-- <!-- Modal -->
<div class="modal fade" id="modal-teacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH USER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name"></div>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" class="form-control" id="email">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-email"></div>
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" class="form-control" id="password">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-password"></div>
                </div>

                <div class="form-group">
                    <label for="classroom" class="control-label">Class</label>
                    <select id="classroom" name="classroom">
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-classroom"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="confirm">SIMPAN</button>
            </div>
        </div>
    </div>
</div> --}}

<div id="modal-teacher" tabindex="-1" aria-hidden="true" class="modal z-10 box-border fixed inset-0 p-20 px-32 py-24 pb-10 flex items-center justify-center overflow-hidden overscroll-contain bg-header/30 transition duration-200 pointer-events-auto visible opacity-100 [&>*]:translate-y-0 [&>*]:scale-100">
                    
    <div class="max-h-full min-w-[50%] w-fit h-fit max-w-full ml-[20%] p-11 px-14 bg-white transition relative rounded-3xl font-Mplus1cus overflow-y-auto hide-scroll">

        <label for="tw-modal" data-dismiss="modal" class="close absolute right-7 top-7 group/hover cursor-pointer">
            <svg width="12" height="11" class="opacity-70 group-hover/hover:opacity-100 transition duration-150" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.71777 9.94068L10.0649 1.95181" stroke="#676767" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.0649 9.94068L1.71777 1.95181" stroke="#676767" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>                        
        </label>
                
        <p class="font-bold text-[28px] text-header">Input Data Counseling Teacher</p>

        <form class="mt-10 w-full flex flex-col gap-8 overflow-y-auto hide-scroll">        
        
            <div class="flex items-center justify-between">
                <label class="font-semibold text-footer opacity-50 text-[13px] mr-16" for="name">Name</label>
                <input id="name" type="text" placeholder="Lexa Otosaka" class="w-[480px] py-3 focus:outline-none focus:border-opacity-90 hover:border-opacity-90 transition duration-200 px-4 border border-footer border-opacity-25 rounded-md font-medium text-xs text-footer">
            </div>

            <div class="flex items-center justify-between gap-10">
                <label class="font-semibold text-footer opacity-50 text-[13px] mr-16" for="class">Class</label>
                <select id="classroom" class="w-[480px] py-3 focus:outline-none focus:border-opacity-90 hover:border-opacity-90 transition duration-200 px-4 border border-footer border-opacity-25 rounded-md font-medium text-xs text-footer"></select>
            </div>

            <div class="flex items-center justify-between gap-10">
                <label class="font-semibold text-footer opacity-50 text-[13px] mr-16" for="email">Email</label>
                <input id="email" type="email" placeholder="beaten by sadness" class="w-[480px] py-3 focus:outline-none focus:border-opacity-90 hover:border-opacity-90 transition duration-200 px-4 border border-footer border-opacity-25 rounded-md font-medium text-xs text-footer">
            </div>

            <div class="flex items-center justify-between gap-10">
                <label class="font-semibold text-footer opacity-50 text-[13px] mr-16" for="password">Password</label>
                <input id="password" type="text" class="w-[480px] py-3 focus:outline-none focus:border-opacity-90 hover:border-opacity-90 transition duration-200 px-4 border border-footer border-opacity-25 rounded-md font-medium text-xs text-footer">
            </div>


            <div class="flex items-center justify-end gap-2 mt-8">

                <button class="rounded-lg mr-auto bg-[#eaeaea] flex items-center gap-1 font-semibold text-footer/80 text-[11px] px-4 py-3 hover:scale-95 transition duration-200">
                    <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.5042 3.65376C12.4909 3.65376 12.4709 3.65376 12.4509 3.65376C8.92369 3.30037 5.40319 3.16702 1.916 3.5204L0.555799 3.65376C0.275758 3.68043 0.029056 3.4804 0.00238546 3.20036C-0.0242851 2.92032 0.175744 2.68028 0.449117 2.65361L1.80931 2.52026C5.35651 2.16021 8.95037 2.30023 12.5509 2.65361C12.8243 2.68028 13.0243 2.92698 12.9976 3.20036C12.9776 3.46039 12.7576 3.65376 12.5042 3.65376Z" fill="#676767"/>
                        <path d="M4.17049 2.98043C4.14382 2.98043 4.11715 2.98043 4.08381 2.97376C3.8171 2.92709 3.63041 2.66705 3.67708 2.40035L3.82377 1.52689C3.93045 0.886795 4.07714 0 5.63067 0H7.37759C8.93782 0 9.08451 0.920133 9.18452 1.53355L9.33121 2.40035C9.37788 2.67372 9.19119 2.93376 8.92448 2.97376C8.65111 3.02044 8.39107 2.83374 8.35107 2.56704L8.20438 1.70025C8.11103 1.12016 8.09103 1.00681 7.38426 1.00681H5.63734C4.9306 1.00681 4.91726 1.10016 4.81725 1.69358L4.66389 2.56037C4.62389 2.80707 4.41052 2.98043 4.17049 2.98043Z" fill="#676767"/>
                        <path d="M8.64407 14.3353H4.36345C2.03644 14.3353 1.9431 13.0485 1.86975 12.0083L1.43636 5.29402C1.41636 5.02065 1.62972 4.78062 1.90309 4.76062C2.18313 4.74728 2.4165 4.95398 2.4365 5.22735L2.8699 11.9417C2.94324 12.9551 2.96991 13.3352 4.36345 13.3352H8.64407C10.0443 13.3352 10.0709 12.9551 10.1376 11.9417L10.571 5.22735C10.591 4.95398 10.8311 4.74728 11.1044 4.76062C11.3778 4.78062 11.5912 5.01398 11.5712 5.29402L11.1378 12.0083C11.0644 13.0485 10.9711 14.3353 8.64407 14.3353Z" fill="#676767"/>
                        <path d="M7.61054 10.6684H5.39022C5.11684 10.6684 4.89014 10.4417 4.89014 10.1683C4.89014 9.89491 5.11684 9.66821 5.39022 9.66821H7.61054C7.88392 9.66821 8.11061 9.89491 8.11061 10.1683C8.11061 10.4417 7.88392 10.6684 7.61054 10.6684Z" fill="#676767"/>
                        <path d="M8.17031 8.00112H4.8365C4.56313 8.00112 4.33643 7.77442 4.33643 7.50105C4.33643 7.22768 4.56313 7.00098 4.8365 7.00098H8.17031C8.44369 7.00098 8.67038 7.22768 8.67038 7.50105C8.67038 7.77442 8.44369 8.00112 8.17031 8.00112Z" fill="#676767"/>
                    </svg>                        
                    Remove
                </button>

                <button data-dismiss="modal" class="rounded-lg px-2 py-3 font-semibold text-footer text-[11px] hover:scale-95 transition duration-200">
                    Cancel
                </button>

                <button id="confirm" class="rounded-lg bg-blue-main shadow-lg hover:scale-95 transition duration-200 tracking-wide font-semibold text-[11px] text-white px-6 py-3">
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</div>


@include('dashboard.admin.Counseling-Teacher Table.js')