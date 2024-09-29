<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DesignDrafts Model
 *
 * @property \App\Model\Table\CampaignsTable&\Cake\ORM\Association\BelongsTo $Campaigns
 * @property \App\Model\Table\DesignPhotosTable&\Cake\ORM\Association\HasMany $DesignPhotos
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 *
 * @method \App\Model\Entity\DesignDraft newEmptyEntity()
 * @method \App\Model\Entity\DesignDraft newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\DesignDraft> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DesignDraft get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\DesignDraft findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\DesignDraft patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\DesignDraft> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DesignDraft|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\DesignDraft saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\DesignDraft>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DesignDraft>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DesignDraft>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DesignDraft> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DesignDraft>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DesignDraft>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DesignDraft>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DesignDraft> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DesignDraftsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('design_drafts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Campaigns', [
            'foreignKey' => 'campaign_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('DesignPhotos', [
            'foreignKey' => 'design_draft_id',
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'design_draft_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('design_name')
            ->maxLength('design_name', 256)
            ->allowEmptyString('design_name');

        $validator
            ->scalar('design_yearlevel')
            ->maxLength('design_yearlevel', 256)
            ->allowEmptyString('design_yearlevel');

        $validator
            ->scalar('specifications')
            ->maxLength('specifications', 256)
            ->allowEmptyString('specifications');

        $validator
            ->scalar('logo_position')
            ->maxLength('logo_position', 256)
            ->allowEmptyString('logo_position');

        $validator
            ->scalar('approval_status')
            ->maxLength('approval_status', 256)
            ->allowEmptyString('approval_status');

        $validator
            ->scalar('belly_band')
            ->maxLength('belly_band', 256)
            ->allowEmptyString('belly_band');

        $validator
            ->scalar('sales_price')
            ->maxLength('sales_price', 256)
            ->allowEmptyString('sales_price');

        $validator
            ->scalar('final_design_photo')
            ->maxLength('final_design_photo', 256)
            ->allowEmptyString('final_design_photo');

        $validator
            ->scalar('feedback')
            ->maxLength('feedback', 1000)
            ->allowEmptyString('feedback');

        $validator
            ->integer('campaign_id')
            ->allowEmptyString('campaign_id');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['campaign_id'], 'Campaigns'), ['errorField' => 'campaign_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
