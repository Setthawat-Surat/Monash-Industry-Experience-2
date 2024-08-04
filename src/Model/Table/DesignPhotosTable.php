<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DesignPhotos Model
 *
 * @property \App\Model\Table\DesignDraftsTable&\Cake\ORM\Association\BelongsTo $DesignDrafts
 *
 * @method \App\Model\Entity\DesignPhoto newEmptyEntity()
 * @method \App\Model\Entity\DesignPhoto newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\DesignPhoto> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DesignPhoto get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\DesignPhoto findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\DesignPhoto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\DesignPhoto> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DesignPhoto|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\DesignPhoto saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\DesignPhoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DesignPhoto>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DesignPhoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DesignPhoto> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DesignPhoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DesignPhoto>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DesignPhoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DesignPhoto> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DesignPhotosTable extends Table
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

        $this->setTable('design_photos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('DesignDrafts', [
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
            ->scalar('photo')
            ->maxLength('photo', 256)
            ->allowEmptyString('photo');

        $validator
            ->integer('design_draft_id')
            ->allowEmptyString('design_draft_id');

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
        $rules->add($rules->existsIn(['design_draft_id'], 'DesignDrafts'), ['errorField' => 'design_draft_id']);

        return $rules;
    }
}
