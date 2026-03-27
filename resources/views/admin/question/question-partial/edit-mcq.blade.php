@if($question->answer=='A')
    <div class="form-group ">
        <div class="form-label">Answer</div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="A" checked>Option A
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="B">Option B
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="C">Option C
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="D">Option D
            </label>
        </div>

    </div>
    @elseif($question->answer=='B')
    <div class="form-group ">
        <div class="form-label">Answer</div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="A">Option A
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="B" checked>Option B
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="C">Option C
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="D">Option D
            </label>
        </div>

    </div>
    @elseif($question->answer=='C')
    <div class="form-group ">
        <div class="form-label">Answer</div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="A">Option A
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="B">Option B
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="C" checked>Option C
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="D">Option D
            </label>
        </div>

    </div>
    @elseif($question->answer=='D')
    <div class="form-group ">
        <div class="form-label">Answer</div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="A">Option A
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="B">Option B
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="C">Option C
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="D" checked>Option D
            </label>
        </div>

    </div>
    @elseif($question->answer==null)
    <div class="form-group ">
        <div class="form-label">Answer</div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="A">Option A
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="B">Option B
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="C">Option C
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="answer" value="D">Option D
            </label>
        </div>

    </div>
@endif