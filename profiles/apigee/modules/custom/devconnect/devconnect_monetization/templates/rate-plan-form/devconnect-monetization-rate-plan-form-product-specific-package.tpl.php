<?php

?>

<div>
  <h3>Plan Details</h3>
  <strong><?php echo $rate_plan->getDisplayName(); ?></strong>
  <?php if ($rate_plan->getChildRatePlan() != NULL): // Start Future Product Specific 1 ?>
  <p style="color: #666;">This plan has a new version effective <?php print substr($rate_plan->getChildRatePlan()->getStartDate(), 0, 10); ?>. Toggle below to see the future rate plan.</p>
  <div class="tabbable">
    <ul class="nav nav-pills">
      <li class="active"><a href="#current" data-toggle="tab">Current</a></li>
      <li class=""><a href="#future" data-toggle="tab">Future</a></li>
    </ul>
    <div class="tab-content">
      <div id="current" class="tab-pane active">
        <?php // Start Future Product Specific 1 ?>
        <?php endif; ?>
        <br>
        <?php if ($rate_plan->getContractDuration() > 0 || $rate_plan->getSetUpFee() > 0 || $rate_plan->getRecurringFee() > 0 || $rate_plan->getEarlyTerminationFee() > 0): ?>
          <table>
            <thead>
            <tr>
              <?php if ($rate_plan->getContractDuration() > 0): ?><th>Renewal Period</th><?php endif; ?>
              <?php if ($rate_plan->getSetUpFee() > 0): ?><th>Set Up Fee</th><?php endif; ?>
              <?php if ($rate_plan->getRecurringFee() > 0): ?><th>Recurring Fees</th><?php endif; ?>
              <?php if ($rate_plan->getEarlyTerminationFee() > 0): ?><th>Early Termination Fee</th><?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <tr>
              <?php if ($rate_plan->getContractDuration() > 0): ?><td><?php echo $rate_plan->getContractDuration() . '&nbsp;' . strtolower($rate_plan->getContractDurationType()) . ($rate_plan->getContractDuration() > 1 ? 's' : ''); ?></td><?php endif; ?>
              <?php if ($rate_plan->getSetUpFee() > 0): ?><td><?php echo $rate_plan->getCurrency()->getName() . '&nbsp;' . sprintf('%.2f', $rate_plan->getSetUpFee()); ?></td><?php  endif; ?>
              <?php if ($rate_plan->getRecurringFee() > 0): ?><td><?php echo _devconnect_monetization_get_frequency_fee_text($rate_plan); ?></td><?php endif; ?>
              <?php if ($rate_plan->getEarlyTerminationFee() > 0): ?><td><?php echo $rate_plan->getCurrency()->getName() . '&nbsp;' . $rate_plan->getEarlyTerminationFee(); ?></td><?php endif; ?>
            </tr>
            </tbody>
          </table>
        <?php endif; ?>
        <?php print devconnect_monetization_build_rate_plan_details_output($rate_plan, isset($product_list) ? $product_list : NULL); ?>
        <?php // End Future Plan Product Specific Plan 1 ?>
        <?php if ($rate_plan->getChildRatePlan() != NULL): ?>
      </div>
      <div id="future" class="tab-pane">
        <br>
        <?php $rate_plan = $rate_plan->getChildRatePlan(); ?>
        <?php if ($rate_plan->getContractDuration() > 0 || $rate_plan->getSetUpFee() > 0 || $rate_plan->getRecurringFee() > 0 || $rate_plan->getEarlyTerminationFee() > 0): ?>
          <table>
            <thead>
            <tr>
              <?php if ($rate_plan->getContractDuration() > 0): ?><th>Renewal Period</th><?php endif; ?>
              <?php if ($rate_plan->getSetUpFee() > 0): ?><th>Set Up Fee</th><?php endif; ?>
              <?php if ($rate_plan->getRecurringFee() > 0): ?><th>Recurring Fees</th><?php endif; ?>
              <?php if ($rate_plan->getEarlyTerminationFee() > 0): ?><th>Early Termination Fee</th><?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <tr>
              <?php if ($rate_plan->getContractDuration() > 0): ?><td><?php echo $rate_plan->getContractDuration() . '&nbsp;' . strtolower($rate_plan->getContractDurationType()) . ($rate_plan->getContractDuration() > 1 ? 's' : ''); ?></td><?php  endif; ?>
              <?php if ($rate_plan->getSetUpFee() > 0): ?><td><?php echo $rate_plan->getCurrency()->getName() . '&nbsp;' . sprintf('%.2f', $rate_plan->getSetUpFee()); ?></td><?php  endif; ?>
              <?php if ($rate_plan->getRecurringFee() > 0): ?><td><?php echo _devconnect_monetization_get_frequency_fee_text($rate_plan); ?></td><?php endif; ?>
              <?php if ($rate_plan->getEarlyTerminationFee() > 0): ?><td><?php echo $rate_plan->getCurrency()->getName() . '&nbsp;' . $rate_plan->getEarlyTerminationFee(); ?></td><?php endif; ?>
            </tr>
            </tbody>
          </table>
        <?php endif; ?>
        <?php print devconnect_monetization_build_rate_plan_details_output($rate_plan, isset($product_list) ? $product_list : NULL); ?>
      </div>
    </div>
  </div>
  <?php endif; //End Future Plan Product Specific Plan 1 ?>
</div>
