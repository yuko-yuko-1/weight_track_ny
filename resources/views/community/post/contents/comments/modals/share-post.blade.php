

<div class="modal fade " id="share-post">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="">
                @csrf
                {{-- @method('PATCH') --}}
                <div class="modal-header">
                    <h5 class="share-post-modal-title mx-auto" id="modalTitleId">
                        Share this post
                    </h5>
                </div>



                <div class="modal-body d-flex justify-content-center align-items-center">
                    <div class="share-icons">
                        {{-- <a href="http://www.facebook.com/share.php?u=yurukei-career.com" target="_blank" rel="nofollow noopener noreferrer" class="facebook_icon"><i class="fa-brands fa-facebook"></i></a> --}}
                        {{-- <a href="//www.facebook.com/sharer.php?src=bm&u=&t=" title="Facebookでシェア" class="facebook_icon"><i class="fa-brands fa-facebook"></i></a> --}}
                        <a href="//www.facebook.com/sharer.php" title="Facebookでシェア" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=600');return false;"><i class="fa-brands fa-facebook"></i></a>
                        <a href="http://twitter.com/share?url=yurukei-career.com&text&via=yurukei20&hashtag"  target="_blank" class="x_icon" rel="nofollow noopener noreferrer"><i class="fa-brands fa-x-twitter"></i></a>
                        {{-- <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-google"></i> --}}
                        <a href="//line.me/R/msg/text/?" target="_blank" class="line_icon" title="LINEに送る" data-bs-dismiss="modal"><i class="fa-brands fa-line"></i></a>


                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

