<form method="POST" enctype="multipart/form-data">
<div class="row">
    <div class="row">
        <div class="small-3 columns">
            <label for="first-name" class="right inline">** First Name:</label>
        </div>
        <div class="small-9 columns">
          <input id="first-name" name="first_name" type="text" 
            value="<?php echo $first_name ?>">
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
            <label for="last-name" class="right inline">** Last Name:</label>
        </div>
        <div class="small-9 columns">
            <input name="last_name" type="text" id="last-name" 
                value="<?php echo $last_name ?>">
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
            <label for="phone" class="right inline">Phone:</label>
        </div>
        <div class="small-9 columns">
            <input name="phone" type="text" id="phone" 
                value="<?php echo $phone ?>">
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
            <label for="email" class="right inline">Email Address:</label>
        </div>
        <div class="small-9 columns">
            <input name="email" type="text" id="email" 
                value="<?php echo $email ?>">
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
            <label for="dob" class="right inline">Date of Birth (MM/DD/YYYY) **:</label>
        </div>
        <div class="small-9 columns">
            <input name="dob" type="text" id="dob" 
                value="<?php echo $dob ?>">
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
            <label for="address" class="right inline">Address:</label>
        </div>
        <div class="small-9 columns">
            <input name="address" type="text" id="address" 
                value="<?php echo $address ?>">
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
            <label for="city" class="right inline">City:</label>
        </div>
        <div class="small-9 columns">
            <input name="city" type="text" id="city" 
                value="<?php echo $city ?>">
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
            <label for="state" class="right inline">State:</label>
        </div>
        <div class="small-9 columns">
            <select name="state" id="state">
                <option value="<?php echo $state ?>" selected="selected"><?php echo $state; ?></option>
                <option value="CO">Colorado</option>
                <option value="WY">Wyoming</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CT">Connecticut</option>
                <option value="DC">District of Columbia</option>
                <option value="DE">Delaware</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
            <label for="zip" class="right inline">Zip Code:</label>
        </div>
        <div class="small-9 columns">
            <input name="zip" type="text" id="zip" 
                value="<?php echo $zip ?>">
        </div>
    </div>
    <div class="row">
        <h2>Emergency Contact</h2>
    </div>
    <div class="row">
        <div class="small-3 columns">
            <label for="emergency_contact" class="right inline">Name:</label>
        </div>
        <div class="small-9 columns">
            <input name="emergency_contact" type="text" id="emergency_contact" 
                value="<?php echo $emergency_contact ?>">
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
            <label for="emergency_phone" class="right inline">Phone:</label>
        </div>
        <div class="small-9 columns">
            <input name="emergency_phone" type="text" id="emergency_phone" 
                value="<?php echo $emergency_phone ?>">
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
            <label for="relationship" class="right inline">Relationship:</label>
        </div>
        <div class="small-9 columns">
            <input name="relationship" type="text" id="relationship" 
                value="<?php echo $relationship ?>">
        </div>
    </div>
    <div class="row">
        <h2>Experience</h2>
    </div>
    <div class="row">
        <p>How did you learn about the Co-op?</p>
        <textarea name="how_learn" rows="5" cols="65">
            <?php echo $how_learn; ?>
        </textarea>
    </div>
    <div class="row">
        <p>Do you have any prior experience fixing bikes? Explain...</p>
        <textarea name="experience" rows="5" cols="65">
            <?php echo $experience; ?>
        </textarea>
    </div>
    <div class="row">
        <p>Do you have any other skills that may help the Co-op?</p>
        <textarea name="other_skills" rows="5" cols="65">
            <?php echo $other_skills; ?>
        </textarea>
    </div>
    <div class="row">
        <p>How skilled are you with tools?</p>
            <select name="skill_level">
                <option value="<?php echo $skill_level; ?>"
                        selected="selected"><?php echo $skill_level; ?></option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
    </div>
    <div class="row">
        <h2>Interests as a volunteer</h2><p>(Move your mouse over an item to see a description.)</p>

        <div class="small-6 columns">
            <input type=checkbox name="greeter" value="1" 
                <?php if ($greeter): echo 'checked'; endif; ?>>
                <strong title="Assist during open shop and retail hours at the co-op.  Greet people, answer questions, sell items and help run the show!">Front
                Desk / Retail / Representative</strong>
        </div>
        <div class="small-6 columns">
            <input type=checkbox name="mechanic"
                   value="1" <?php if ($mechanic): echo 'checked'; endif; ?> ><strong
                title="Our bike mechanics work on sorting donations, building/fixing bikes and teaching people during open shop. You will need to have demonstrable bike mechanic skills to do this work.">Bike
                Mechanic</strong>
        </div>
        <div class="small-6 columns">
            <input type=checkbox name="recycling"
                       value="1" <?php if ($recycling): echo 'checked'; endif; ?>>
                       <strong
                    title="With all of the bikes and parts that come through the Co-op, there are a lot of parts that are broken or junk. Somebody has to go through it all.">Recycling</strong>
        </div>
        <div class="small-6 columns">
            <input type=checkbox name="bars"
                   value="1" <?php if ($bars): echo 'checked'; endif; ?>>
            <strong
                title="Respond to public reports of lost and abandoned bikes to coordinate retrieval; work with Police Services in tracking found bikes and returning them to their owners.">Bike Retrieval</strong>
        </div>
        <div class="small-6 columns">
            <input type=checkbox
                name="cleaning" <?php if ($cleaning): echo 'checked'; endif; ?>>Cleaning/Organizing the Shop
        </div>
        <div class="small-6 columns">
            <input type=checkbox name="handyman"
                   value="1" <?php if ($handyman): echo 'checked'; endif; ?>><strong
                title="Projects range from installing sinks, running low voltage and 110vac wiring, replacing a staircase, building partition walls etc.  Will work with construction leader to complete a variety of projects.">Handyman/Construction</strong>
        </div>
        <div class="small-6 columns">
            <input type=checkbox name="newsletter"
                       value="1" <?php if ($newsletter): echo 'checked'; endif; ?>>Newsletter Drafting/PR
        </div>
        <div class="small-6 columns">
            <input type=checkbox name="art"
                       value="1" <?php if ($art): echo 'checked'; endif; ?>
                       >Art Contributions / Graphic Design
        </div>
        <div class="small-6 columns">
            <input type=checkbox name="fundraising"
                       value="1" <?php if ($fundraising): echo 'checked'; endif; ?>>Fundraising / Grant Writing
        </div>
        <div class="small-6 columns">
            <input type=checkbox name="community"
                   value="1" <?php if ($community): echo 'checked'; endif; ?>>Helping with Community Outreach
        </div>
        <div class="small-6 columns">
            <input type=checkbox name="local_events" value="1" 
                <?php if ($local_events): echo 'checked'; endif; ?>>Assist With Local Bike Events
        </div>
        <div class="small-6 columns">
            <input type=checkbox name="kidtrips"
                    value="1" <?php if ($kidtrips): echo 'checked'; endif; ?>><strong
                title="Trips for Kids a program that takes underprivileged kids aged 10-15 out on mountain bike rides on Saturday mornings. We need mechanics and ride volunteers.">Trips for Kids</strong>
        </div>
        <div class="small-6 columns">
            <input type=checkbox name="teach" value="1" <?php if ($teach): echo 'checked'; endif; ?>>
                <strong href="#" title="Help educate our community on bicycle safety and smart cycling based on the vehicular cycling principles of the League of American Bicyclists.  Work with the Co-op’s Smart Cycling coordinator to teach classes to kids and adults, including bike skills workshops (also called “bike rodeos”).  We hope to eventually lead smart cycling rides in town to demonstrate the principles that we teach.">Bike Safety Education</strong>
        </div>
    </div>
    <div class="row">
        <h2>Final Question</h2>
    </div>
    <div class="row">
        <p>What are your expectations out of volunteering for the Co-op?</p>
        <textarea name="expectations" rows="5" cols="65"><?php echo $expectations ?></textarea>
    </div>
    <div class="row">
        <p>Any other questions, comments, or concerns?</p>
        <textarea name="concerns" rows="5" cols="65"><?php echo $concerns ?></textarea>
    </div>
    <div class="row">
        <input class="button" type="submit" value="Submit">
    </div>
</div>
</form>