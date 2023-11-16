<div class="app">
  <div class="app__controls flex-sb-aic">
    <div class="set__filter flex-sb-aic">
      <div>
        <label>Filter by: </label>
        <select class="app__filter" id="">
          <option value="all">All</option>
          <option value="dateSpec">Specific Date</option>
          <option value="dateRange">Date Range</option>
          <option value="status">Status</option>
        </select>
      </div>

      <div class="select__all">
        <input type="text" value="No filter" disabled />
      </div>
      <div class="select__date range hide flex-sb-aic">
        <div class="date__container">
          <label for="">From</label>
          <input type="date" />
        </div>
        <div class="date__container">
          <label for="">To</label>
          <input type="date" />
        </div>
      </div>
      <div class="select__date spec hide flex-sb-aic">
        <div class="date__container">
          <label for="">Choose</label>
          <input type="date" />
        </div>
      </div>
      <div class="select__status hide">
        <select class="app__filter" id="">
          <option value="all">All</option>
          <option value="pending">Pending</option>
          <option value="certified">Certified</option>
          <option value="declined">Declined</option>
        </select>
      </div>
      <button class="button apply__filter">Filter</button>
    </div>

    <div class="printMe flex-jc-aic">
     <span class="fa fa-print print_icon"></span><span class="print__preview">Print</span>
    </div>
    <p class="search__title d-none">Search</p>
    <div class="search flex-jc-aic">
      <span class="flex-jc-aic"><i class="fa fa-search"></i></span>
      <input type="text" />
    </div>
  </div>
  <span class="app_id d-none"></span>
  <div class="app__header applications flex-sb-aic">
    <p class="flex btn">#</p>
    <p class="flex">Reg. Number</p>
    <p class="flex">Nursery Name</p>
    <p class="flex">Date Applied</p>
    <p class="flex">Date Inspected</p>
    <p class="flex btn">Score</p>
    <p class="flex btn">Rating</p>
    <p class="flex btn">Status</p>
    <p class="flex btn">Feedback</p>
  </div>
  <div class="app__content">
    <table class="app__table">
      <tbody id="tbody"></tbody>
    </table>
  </div>
  <div class="app__guide hide flex-col">
    <span class="close__guide">&times;</span>
    <p class="guide__head flex-jc-aic">My Applications Guide</p>
    <p class="guide__one">Nursery inspection details are shown in this section.</p>
    <p class="guide__one">You can use the filter tools and print tool provided at the top.</p>
    <p class="guide__two">To view inspection feedback for any nursery, click on the <strong>comment</strong> icon next to it.</p>
    <p class="guide__three">For every certified nursery, an email will be sent to you with further information on how you can acquire your certificate.</p>
  </div>
  <?php include "./modals/views/report_iframe.html"; ?>
  <?php include "./modals/views/feedback_iframe.html"; ?>
</div>

<div class="zero__content flex-col-jcaic hide">
  <p class="zero__content__title t-center">
    There are no applications made for certification yet
  </p>
  <button type="button" class="button applyCert">Make an application</button>
  <div class="zero__content__image"></div>
</div>

